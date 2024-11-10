<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\Storage;
use App\Models\Notification;
use Ramsey\Uuid\Uuid;
use App\Models\Utility;
use App\Models\Conversion;

class IncomingEmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    
    
    public function handleWebhook(Request $request)
    {
        $payload = $request->all();
        $from_email=$payload['From'];
        
        preg_match('/<(.*?)>/', $payload['from'], $matches);

        if (!empty($matches)) {
            $senderEmail = $matches[1];
        }

        $subject = $payload['Subject'];
        $content = $payload['stripped-html']; 
        $quotedSectionPos = strpos($content, '<div class="gmail_quote">');
    
        if ($quotedSectionPos !== false) {
            $content = substr($content, 0, $quotedSectionPos);
        }
        $name = explode('<', $from_email)[0];
        $name = trim($name);
        
        $ticketData=[
            'name' => $name,
            'email'=>$senderEmail,
            'category'=>11,
            'subject' =>$subject,
            'student_type'=>'public',
            'status'=>'New Ticket',
            'description'=>$content,
            'priority' => 1,
            'ticket_id'=>time(),
            'created_by'=>'1',
            'attachments'=>json_encode([]),
        ]; 
         $combinedMessage=$senderEmail;
        try{
        $tickets = Ticket::where('email', $senderEmail)->orderBy('created_at', 'desc')->get();
       
         if ($tickets->isEmpty()) {
             
             $ticket=Ticket::create($ticketData);
             Notification::create([
            'id' => Uuid::uuid4()->toString(),
            'type' => 'new_ticket',
            'data' => 'New Tiket Created',
            'status' => 'unreaded',
            'ticket_id'=>$ticket->id
        ]);
        // Send Email to User
        $uArr = [
            'ticket_name' => $ticket->name,
            'email' => $senderEmail,
            'category' => 1,
            'subject' => $subject,
            'status' => 'New Ticket',
            'description' => $content,
            'ticket_id' => $ticket->ticket_id,
        ];
        Utility::sendEmailTemplate('new_ticket', [$senderEmail], $uArr);
            $combinedMessage="created";
        } elseif ($tickets->count() > 0) {
            
            $ticket = $tickets->first();
            $ticketData=[
            'description'=>$content,
            'sender'=>'user',
            'ticket_id'=>$ticket->id,
            'attachments'=>json_encode([]),
        ];
        $conversion = Conversion::create($ticketData);
          if($ticketData['sender'] =='user')
                {
                    try {
                        Notification::create([
                            'id' => Uuid::uuid4()->toString(),
                            'type' => 'new_reply',
                            'data' => 'New Reply Sent',
                            'status' => 'unreaded',
                            'ticket_id'=>$ticket->id,
                        ]);
                          } catch (\Exception $e) {
                          dd($e);
                        }
                }
            $ticket->status = 'In Progress';
            $ticket->update();
            $combinedMessage=$ticket->id;
            
        } else {
            $combinedMessage='last ticket';
        }
        } catch (Exception $e) {
                $combinedMessage=$e->getMessage();
    
            }
        
        // $combinedMessage = "From: $senderEmail\nSubject: $subject\nContent: $content\n\n";
                // $jsonPayload = json_encode($payload, JSON_PRETTY_PRINT);
                // $filePath = storage_path('app/webhook_payloads/combined_payload.json');
                // file_put_contents($filePath, $jsonPayload);
        
        
        $filePath = storage_path('app/webhook_payloads/combined_payload.txt');
        file_put_contents($filePath, $combinedMessage, FILE_APPEND);
        
         
        // return response()->json(['response'=>$payload]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  \Illuminate\Support\Facades\Log::info($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

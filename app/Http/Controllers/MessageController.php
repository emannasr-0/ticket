<?php

namespace App\Http\Controllers;

use App\Models\FloatingChatMessage;
use App\Models\FloatingChatUser;
use App\Models\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Pusher\Pusher;
use Illuminate\Support\Facades\Http;

class MessageController extends Controller
{
    public function index()
    {
        $setting = Utility::settings();

        // dd($setting);
        if($setting['CHAT_MODULE'] == 'yes')
        {
            $objUser = Auth::user();
            //        $users   = User::where('users.id', '!=', $objUser->id)->get();
            $users = FloatingChatUser::where('is_end', '!=', '1')->orderBy('id', 'DESC')->get();

            return view('admin.chats.index', compact('users','setting'));
        }
        else
        {
            return redirect()->back();
        }
    }

    public function getMessage($user_id)
    {
        $my_id = 0;

        // Make read all unread message
        FloatingChatMessage::where(
            [
                'from' => $user_id,
                'to' => $my_id,
            ]
        )->update(['is_read' => 1]);

        // Get all message from selected user
        // $messages = FloatingChatMessage::where(
        //     function ($query) use ($user_id, $my_id){
        //         $query->where('from', $user_id)->where('to', $my_id);
        //     }
        // )->oRwhere(
        //     function ($query) use ($user_id, $my_id){
        //         $query->where('from', $my_id)->where('to', $user_id);
        //     }
        // )->get();
// api 
        $token='Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJqdGkiOiI4ZGJkMDdlNi0zNGI5LTQ5OTctYWIyOC1lMWVkOTAzM2YzYWQiLCJ1bmlxdWVfbmFtZSI6ImFuYXNhY2FkZW15QGhvdG1haWwuY29tIiwibmFtZWlkIjoiYW5hc2FjYWRlbXlAaG90bWFpbC5jb20iLCJlbWFpbCI6ImFuYXNhY2FkZW15QGhvdG1haWwuY29tIiwiYXV0aF90aW1lIjoiMDEvMTAvMjAyNCAxMzo1ODoyMCIsImRiX25hbWUiOiI3NTE0IiwiaHR0cDovL3NjaGVtYXMubWljcm9zb2Z0LmNvbS93cy8yMDA4LzA2L2lkZW50aXR5L2NsYWltcy9yb2xlIjoiQURNSU5JU1RSQVRPUiIsImV4cCI6MjUzNDAyMzAwODAwLCJpc3MiOiJDbGFyZV9BSSIsImF1ZCI6IkNsYXJlX0FJIn0.I-CixweLPqwevQTGY9-tUmiTxkICYs3DYPuqj88gJW0';
        $APIresponse = Http::withHeaders([
            'Authorization' => $token,
        ])->get('https://live-server-7514.wati.io/api/v1/getMessages/201032537405');
        $data = $APIresponse->json();
        $messages = $data['messages']['items'];
        $messages = array_reverse($messages);
// 
        $messagehtml = view('admin.chats.message', compact('messages'))->render();

        $deletehtml = '';
       
        if(count($messages) > 0)
        {
            $url = route("admin.delete.user.message",$user_id);
            $deletehtml = '<div class="action-btn bg-danger ms-2"> '.
                                     ' <form method="POST" action="'. $url .'" id="delete-form-'. $user_id .'"> '.
                                    //  csrf_token() .
                                    '<input type="hidden" name="_token" value="' . csrf_token() . '">'.
                                    '<input type="hidden" name="_method" value="DELETE">'.
                                    ' <input name="_method" type="hidden" value="DELETE"> '.
                                    ' <button type="submit" class="mx-3 btn btn-sm d-inline-flex align-items-center show_confirm" data-toggle="tooltip" title="Delete"> '.
                                    '<span class="text-white"> <i class="ti ti-trash"></i></span> '.
                                      '</button>'.
                                      '</form>'.
                                      '</div>';
        }
        $response = [
            'messagehtml' => $messagehtml,
            'deletehtml' => $deletehtml,
        ];

        return json_encode($response);
    }

    public function sendMessage(Request $request)
    {
        // $setting      = Utility::settings();
        // $from    = 0;
        // $to      = $request->receiver_id;
        // $message = $request->message;

        // // if($message == "")
        // // {
        // //     return ;
        // // }

        // $data          = new FloatingChatMessage();
        // $data->from    = $from;
        // $data->to      = $to;
        // $data->message = $message;
        // $data->is_read = 0; // message will be unread when sending message
        // $data->save();

        // // pusher
        // $options = array(
        //     'cluster' => $setting['PUSHER_APP_CLUSTER'],
        //     'useTLS' => true,
        // );

        // // dd($options);
        // $pusher = new Pusher(
        //     $setting['PUSHER_APP_KEY'], $setting['PUSHER_APP_SECRET'], $setting['PUSHER_APP_ID'], $options
        // );

        // $data = [
        //     'from' => $from,
        //     'to' => $to,
        // ]; // sending from and to user id when pressed enter

        // $pusher->trigger('my-channel', 'my-event', $data);
        
        // api
        
        $message = $request->message;
        if($message == "")
        {
            return ;
        }
        $token='Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJqdGkiOiI4ZGJkMDdlNi0zNGI5LTQ5OTctYWIyOC1lMWVkOTAzM2YzYWQiLCJ1bmlxdWVfbmFtZSI6ImFuYXNhY2FkZW15QGhvdG1haWwuY29tIiwibmFtZWlkIjoiYW5hc2FjYWRlbXlAaG90bWFpbC5jb20iLCJlbWFpbCI6ImFuYXNhY2FkZW15QGhvdG1haWwuY29tIiwiYXV0aF90aW1lIjoiMDEvMTAvMjAyNCAxMzo1ODoyMCIsImRiX25hbWUiOiI3NTE0IiwiaHR0cDovL3NjaGVtYXMubWljcm9zb2Z0LmNvbS93cy8yMDA4LzA2L2lkZW50aXR5L2NsYWltcy9yb2xlIjoiQURNSU5JU1RSQVRPUiIsImV4cCI6MjUzNDAyMzAwODAwLCJpc3MiOiJDbGFyZV9BSSIsImF1ZCI6IkNsYXJlX0FJIn0.I-CixweLPqwevQTGY9-tUmiTxkICYs3DYPuqj88gJW0';
        try {
                $response = Http::withHeaders([
                    'Content-Type' => 'application/x-www-form-urlencoded',
                    'Authorization' => $token,
                ])->asForm()->post('https://live-server-7514.wati.io/api/v1/sendSessionMessage/201032537405?messageText='.$message);
            
                $data = $response->json();
                return $data;
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }

    }

    // For Floating Chat
    public function store(Request $request)
    {
        if(!empty($request->email))
        {
            $floatingUser = FloatingChatUser::create(['email' => $request->email]);

            $floatingUser = [
                'email' => $floatingUser->email,
                'id' => $floatingUser->id,
            ];

            return $floatingUser;
            // return 'true';
        }
        else
        {
            return 'false';
        }
    }

    public function getFloatingMessage()
    {
        $cookie_val = json_decode($_COOKIE['chat_user']);

        $user_id = $cookie_val->id;
        $my_id   = 0;

        // Make read all unread message
        FloatingChatMessage::where(
            [
                'from' => $user_id,
                'to' => $my_id,
            ]
        )->update(['is_read' => 1]);

        // Get all message from selected user
        $messages = FloatingChatMessage::where(
            function ($query) use ($user_id, $my_id){
                $query->where('from', $user_id)->where('to', $my_id);
            }
        )->oRwhere(
            function ($query) use ($user_id, $my_id){
                $query->where('from', $my_id)->where('to', $user_id);
            }
        )->get();

        return view('admin.chats.floating_message', ['messages' => $messages]);
    }

    public function sendFloatingMessage(Request $request)
    {

        $cookie_val = json_decode($_COOKIE['chat_user']);
        $setting      = Utility::settings();

        $from    = empty($_COOKIE['chat_user']) ? 0 : $cookie_val->id;
        $to      = (!empty($request->receiver_id)) ? $request->receiver_id : 0;
        $message = $request->message;


        if($message != null)
        {

            $data          = new FloatingChatMessage();
            $data->from    = $from;
            $data->to      = $to;
            $data->message = $message;
            $data->is_read = 0;
            $data->save();
        }

        // pusher
        $options = array(
            'cluster' => $setting['PUSHER_APP_CLUSTER'],
            'useTLS' => true,
        );

        $pusher = new Pusher(
            $setting['PUSHER_APP_KEY'], $setting['PUSHER_APP_SECRET'], $setting['PUSHER_APP_ID'], $options
        );

        $data = [
            'from' => $from,
            'to' => $to,
        ]; // sending from and to user id when pressed enter
        $pusher->trigger('my-channel', 'my-event', $data);
    }

    // End Floating Chat
    public function deleteUserMessage(Request $request, $user_id)
    {
        FloatingChatMessage::where('from', $user_id)->oRwhere('to', $user_id)->delete();
        return redirect()->back()->with('success', __('Chat deleted Successfully'));
    }
}

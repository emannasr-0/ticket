<?php

namespace App\Http\Controllers;

use Ramsey\Uuid\Uuid;
use App\Models\Category;
use App\Models\Conversion;
use App\Models\CustomField;
use App\Models\Faq;
use App\Mail\SendTicket;
use App\Models\UserCatgory;
use App\Mail\SendTicketAdmin;
use App\Mail\SendTicketReply;
use App\Models\Company;
use App\Models\Group;
use App\Models\Ticket;
use App\Models\Notification;
use App\Models\User;
use App\Models\Knowledge;
use App\Models\Utility;
use App\Models\Settings;
use App\Models\Priority;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    private  $language;
    public function __construct()
    {
        if (!file_exists(storage_path() . "/installed")) {
            return redirect('install');
        }

        $language = Utility::getSettingValByName('DEFAULT_LANG');
        \App::setLocale(isset($language) ? $language : 'en');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        if (!file_exists(storage_path() . "/installed")) {
            return redirect('install');
        }
        if (Auth::user()) {
            return redirect()->route('admin.dashboard');
        }

        $customFields = CustomField::orderBy('order')->get();
        $categories   = Category::get();
        $priorities = Priority::get();

        $setting      = Utility::settings();
        $companies = Company::all();
        $groups = Group::all();

       
        return view('home', compact('categories', 'customFields', 'setting', 'priorities','companies','groups'));
    }

    public function form()
    {
        if (!file_exists(storage_path() . "/installed")) {
            return redirect('install');
        }
       

        $customFields = CustomField::orderBy('order')->get();
        $categories   = Category::get();
        $priorities = Priority::get();

        $setting      = Utility::settings();
        $companies = Company::all();
        $groups = Group::all();

       
        return view('home', compact('categories', 'customFields', 'setting', 'priorities','companies','groups'));
    }


    // public function getUsersForGroup($groupId)
    // {
    //    // dd($groupId);
    //     $users = Group::getUsers($groupId);
        
    //     // Check if users exist and return them in a JSON format
    //     if ($users) {
    //         return response()->json($users);
    //     }

    //     return response()->json([], 404); // Return empty if no users found
    // }




//     public function getGroupsByCompany($companyId)
// {
//     // Find the company by ID and load its related groups
//     $company = Company::findOrFail($companyId);
//     $groups = $company->groups;  // Get all groups related to the company

//     // Return the groups as a JSON response
//     return response()->json(['groups' => $groups]);
// }

    public function search()
    {
        $setting      = Utility::settings();
        $lang         = Utility::languages();
        return view('search', compact('setting', 'lang'));
    }

    public function faq()
    {
        $setting      = Utility::settings();
        if ($setting['FAQ'] == 'on') {
            $faqs = Faq::get();

            return view('faq', compact('faqs', 'setting'));
        } else {
            return redirect('/');
        }
    }

    public function ticketSearch(Request $request)
    {
        $validation = [
            'ticket_id' => ['required'],
            'email' => ['required'],
        ];

        $this->validate($request, $validation);
        $ticket = Ticket::where('ticket_id', '=', $request->ticket_id)->where('email', '=', $request->email)->first();

        if ($ticket) {
            return redirect()->route('home.view', Crypt::encrypt($ticket->ticket_id));
        } else {
            return redirect()->back()->with('info', __('Invalid Ticket Number'));
        }

        return view('search');
    }
    


    public function store(Request $request)
    {
        
        $validation = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
           // 'category' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            //'student_type' => 'required|in:now,previous,public',
            'status' => 'required|string|max:100',
            'description' => 'required',
            'priority' => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id',
            'group_id' => 'required|exists:groups,id',
            'user_id' => 'required|exists:users,id',
        ];
       
        if (env('RECAPTCHA_MODULE') == 'yes') {
            $validation['g-recaptcha-response'] = 'required|captcha';
        }

        $this->validate($request, $validation);

        $post              = $request->all();
        $post['ticket_id'] = time();
        $post['created_by'] = '1';
        $data              = [];
        if ($request->hasfile('attachments')) {
            $errors = [];
            foreach ($request->file('attachments') as $filekey => $file) {
                $name = $file->getClientOriginalName();
                $dir        = ('tickets/' . $post['ticket_id']);
                $path = Utility::multipalFileUpload($request, 'attachments', $name, $dir, $filekey, []);

                if ($path['flag'] == 1) {
                    $data[] = $path['url'];
                } elseif ($path['flag'] == 0) {
                    $errors = __($path['msg']);
                } else {
                    return redirect()->route('tickets.store', \Auth::user()->id)->with('error', __($path['msg']));
                    //return redirect()->back()->with('error', __($path['msg']));

                }
            }
        }
       // dd($post);
        $post['attachments'] = json_encode($data);
        $ticket              = Ticket::create($post);
        CustomField::saveData($ticket, $request->customField);
         
      
        // Send Email to User
        $company = Company::find($request->company_id);
        $uArr = [
            'ticket_name' => $ticket->name,
            'email' => $request->email,
            'category' => $request->category,
            'subject' => $request->subject,
            'status' => $request->status,
            'description' => $request->description,
            'ticket_id' => $ticket->ticket_id,
            'company_name' => $company ? $company->name : 'N/A',
        ];
         try {
        Notification::create([
            'id' => Uuid::uuid4()->toString(),
            'type' => 'new_ticket',
            'data' => 'New Tiket Created',
            'status' => 'unreaded',
            'ticket_id'=>$ticket->id
        ]);
          } catch (\Exception $e) {
           dd($e);
        }
        // Send Email to User
        try {

            //Mail Send Agent
            // $userids = UserCatgory::where('category_id', $request->category)->pluck('user_id');
            // $agents = User::whereIn('id', $userids)->get();

            // foreach ($agents as $agent) {
            //     // Mail::to($agent->email)->send(new SendTicketAdmin($agent, $ticket));
            //     Utility::sendEmailTemplate('new_ticket', [$agent->email], $uArr);
            // }

            // Mail Send  Ticket User
            // Mail::to($ticket->email)->send(new SendTicket($ticket));

            // Utility::sendEmailTemplate('new_ticket',$agent,$uArr,$ticket);


            $group = Group::find($request->group_id);
            $user = User::find($request->user_id);  // Get the user associated with the ticket
    
            // Send email to the group if it has an email
            if ($group && $group->email) {
                Utility::sendEmailTemplate('new_ticket', [$group->email], $uArr);
            }
    
            // Send email to the user
            if ($user && $user->email) {
                Utility::sendEmailTemplate('new_ticket', [$user->email], $uArr);
            }
            Utility::sendEmailTemplate('new_ticket', [$request->email], $uArr);
        } catch (\Exception $e) {
            $error_msg = __('E-Mail has been not sent due to SMTP configuration');
        }
        return view('ticket_created');
    }

    public function view($ticket_id)
    {
        $ticket_id = Crypt::decrypt($ticket_id);
        $ticket    = Ticket::where('ticket_id', '=', $ticket_id)->first();
        if ($ticket) {
            return view('show', compact('ticket'));
        } else {
            return redirect()->back()->with('error', __('Some thing is wrong'));
        }
    }

    public function reply(Request $request, $ticket_id)
    {
        $ticket = Ticket::where('ticket_id', '=', $ticket_id)->first();
        if ($ticket) {
            $validation = ['reply_description' => ['required']];
            if ($request->hasfile('reply_attachments')) {
                $validation['reply_attachments.*'] = 'mimes:zip,rar,jpeg,jpg,png,gif,svg,pdf,txt,doc,docx,application/octet-stream,audio/mpeg,mpga,mp3,wav|max:204800';
            }
            $this->validate($request, $validation);

            $post                = [];
            $post['sender']      = 'user';
            $post['ticket_id']   = $ticket->id;
            $post['description'] = $request->reply_description;
            
            $data                = [];
            if ($request->hasfile('reply_attachments')) {
                foreach ($request->file('reply_attachments') as $file) {
                    $name = $file->getClientOriginalName();
                    $file->storeAs('/tickets/' . $ticket->ticket_id, $name);
                    $data[] = $name;
                }
            }
            $post['attachments'] = json_encode($data);
            $conversion          = Conversion::create($post);
            if($post['sender'] =='user')
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

            // slack //
            $settings  = Utility::non_auth_settings($ticket->created_by);

            if (isset($settings['reply_notification']) && $settings['reply_notification'] == 1) {
                $uArr = [
                    'name' => $request->name,
                    'ticket_id' => $ticket->id,
                    'email' => $ticket->email,
                    'description' => $request->reply_description,
                    //  'user_name'  => \Auth::user(),
                ];
                Utility::send_slack_msg('new_ticket_reply', $uArr, $ticket->created_by);
            }
            // telegram //
            $settings  = Utility::settings($ticket->created_by);
            if (isset($settings['telegram_reply_notification']) && $settings['telegram_reply_notification'] == 1) {
                $uArr = [
                    'name' => $request->name,
                    'ticket_id' => $ticket->id,
                    'email' => $ticket->email,
                    'description' => $request->reply_description,
                    'user_name'  => $request->name,
                ];
                Utility::send_telegram_msg('new_ticket_reply', $uArr, $ticket->created_by);
            }
            // Send Email to User
            try {
                $users = User::join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
                ->where('model_has_roles.model_type', '=', 'App\Models\User')
                ->where('model_has_roles.role_id', '=', 1)
                ->where('users.email', '!=', 'Omar@anasacademy.uk')
                ->get();

                foreach ($users as $user) {
                    Mail::to($user->email)->send(new SendTicketReply($user, $ticket, $conversion));
                }
            } catch (\Exception $e) {
                $error_msg = __('E-Mail has been not sent due to SMTP configuration');
            }

            return redirect()->back()->with('success', __('Reply added successfully') . ((isset($error_msg)) ? '<br> <span class="text-danger">' . $error_msg . '</span>' : ''));
        } else {
            return redirect()->back()->with('error', __('Something is wrong'));
        }
    }

    public function knowledge(Request $request)
    {
        $setting      = Utility::settings();
        if ($setting['Knowlwdge_Base'] == 'on') {
            $knowledges = Knowledge::select('category')->groupBy('category')->get();
            $knowledges_detail = knowledge::get();

            return view('knowledge', compact('knowledges', 'knowledges_detail', 'setting'));
        } else {
            return redirect('/');
        }
    }

    public function knowledgeDescription(Request $request)
    {
        $descriptions = knowledge::find($request->id);
        return view('knowledgedesc', compact('descriptions'));
    }
}

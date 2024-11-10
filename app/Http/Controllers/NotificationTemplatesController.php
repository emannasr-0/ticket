<?php

namespace App\Http\Controllers;

use App\Models\NotificationTemplateLangs;
use App\Models\NotificationTemplates;
use App\Models\Utility;
use App\Models\Languages;
use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationTemplatesController extends Controller
{
    public function index($id = null, $lang = 'en')
    {
        if(\Auth::user()->parent == 0)
        {

            if($id != null)
            {

                $notification_template     = NotificationTemplates::where('id',$id)->first();
            }
            else
            {
                $notification_template     = NotificationTemplates::first();
            }
            if(empty($notification_template))
            {
                return redirect()->back()->with('error', __('Not exists in notification template.'));
            }
            $languages         = Utility::languages();
            $curr_noti_tempLang = NotificationTemplateLangs::where('parent_id', '=', $notification_template->id)->where('lang', $lang)->where('created_by', '=', \Auth::user()->createId())->first();
            if(!isset($curr_noti_tempLang) || empty($curr_noti_tempLang))
            {
                $curr_noti_tempLang       = NotificationTemplateLangs::where('parent_id', '=', $notification_template->id)->where('lang', $lang)->first();
            }
            if(!isset($curr_noti_tempLang) || empty($curr_noti_tempLang))
            {
                $curr_noti_tempLang       = NotificationTemplateLangs::where('parent_id', '=', $notification_template->id)->where('lang', 'en')->first();
                !empty($curr_noti_tempLang) ? $curr_noti_tempLang->lang = $lang : null;
            }
            $notification_templates = NotificationTemplates::all();
            $LangName = Languages::where('code',$curr_noti_tempLang->lang)->first();
            return view('notification_templates.index', compact('notification_template','LangName','notification_templates','curr_noti_tempLang','languages'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
    public function update(Request $request,$id)
    {
        $validator = \Validator::make(
            $request->all(), [
                                'content' => 'required',
                            ]
        );
        if($validator->fails())
        {
            $messages = $validator->getMessageBag();
            return redirect()->back()->with('error', $messages->first());
        }
        $NotiLangTemplate = NotificationTemplateLangs::where('parent_id', '=', $id)->where('lang', '=', $request->lang)->where('created_by', '=', \Auth::user()->createId())->first();
        // if record not found then create new record else update it.
        if(empty($NotiLangTemplate))
        {
            $variables = NotificationTemplateLangs::where('parent_id', '=', $id)->where('lang', '=', $request->lang)->first()->variables;
            $NotiLangTemplate            = new NotificationTemplateLangs();
            $NotiLangTemplate->parent_id = $id;
            $NotiLangTemplate->lang      = $request['lang'];
            $NotiLangTemplate->content   = $request['content'];
            $NotiLangTemplate->variables = $variables;
            $NotiLangTemplate->created_by = \Auth::user()->createId();
            $NotiLangTemplate->save();
        }
        else
        {
            $NotiLangTemplate->content = $request['content'];
            $NotiLangTemplate->save();
        }
        return redirect()->route(
            'notification-templates.index', [
                $id,
                $request->lang,
            ]
        )->with('success', __('Notification Template successfully updated.'));
    }
    
     public function markAllRead()
    {
      try {
            $unreadNotifications = Notification::where('status', 'unreaded')->get();
    
            foreach ($unreadNotifications as $notification) {
                $notification->update([
                    'status' => 'readed',
                ]);
            }
    
            return redirect()->route('admin.dashboard');
            
        } catch (\Exception $e) {
           
            dd($e);
        }
    }
    public function markAsRead($id)
    {

        try {
           
        $notification = Notification::find($id);

        $notification->update([
            'status' => 'readed',
        ]);
 $ticketId = $notification->ticket_id;

    return redirect('/admin/ticket/' . $ticketId . '/edit');
    //   return redirect()->route('admin.dashboard');
        }  catch (\Exception $e) {
           dd($e);
        }
    }

    public function fetch()
    {
        $authUser = auth()->user();
    
        if ($authUser->parent == 0) {
            $notifications = Notification::where('status', 'unreaded')
                ->orderBy('created_at', 'desc')
                ->get();
            return response()->json(['notifications' => $notifications]);
        }
    
        $notifications = Notification::where('status', 'unreaded')
            ->with('ticket')
            ->orderBy('created_at', 'desc')
            ->get();
    
        $filteredNotifications = $notifications->filter(function ($notification) use ($authUser) {
           
            return in_array($notification->ticket->ticketCategory->id, $authUser->categories->pluck('id')->toArray());
        });
    
        return response()->json(['notifications' => $filteredNotifications]);
    }

}

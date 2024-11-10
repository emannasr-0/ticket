<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Group;
use App\Models\OperatingHours;

class GroupController extends Controller
{
    public function index(Request $request)
    {
        $user = \Auth::user();

        $groups = Group::with('company')  // Eager load the company relationship
                   ->where('created_by', \Auth::user()->id)
                   ->get();
         return view('admin.groups.index',compact('groups'));

    }

    public function getUsers($groupId)
    {
        $group = Group::findOrFail($groupId);

        // Get the user IDs from the 'users' column (which is a comma-separated string)
        $userIds = explode(',', $group->users);

        // Retrieve the actual User models based on the IDs
        $users = User::whereIn('id', $userIds)->get();

        // Return the users as a JSON response
        return response()->json($users);
    }

    public function create()
    {
         $user = \Auth::user();
         $users = User::where('parent',\Auth::user()->createId())->get()->pluck('name','id');


         $users->users  = explode(',', $user->users);


         $opeatings = OperatingHours::where('created_by',\Auth::user()->createId())->get()->pluck('name','id');

       
         $leader = User::where('parent',\Auth::user()->createId())->get()->pluck('name','id');
         $leader->leader  = explode(',', $user->leader);
         $companies = Company::all();

         if(\Auth::user()->parent == 0)
         {
             return view('admin.groups.create',compact('users','leader','opeatings', 'companies'));
         }
         else
         {
             return redirect()->back()->with('error', __('Permission denied.'));
         }

    }

    public  function store(Request $request)
    {
      
        $user = \Auth::user();

            $validation = [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'operating_hours' => 'required|string|max:255',
                'users' => 'required|string|max:255',
                'leader' => 'required|string|max:100',
                'description' => 'required',
                'company_id' => 'required|exists:companies,id'
            ];

            // $validator = \Validator::make($request->all(), $validation);
            // if ($validator->fails()) {
            //     $messages = $validator->getMessageBag();
            //     return redirect()->back()->with('error', $messages->first());
            // }

            $post = [
                'name' => $request->name,
                'email' => $request->email,
                'operating_hours' => $request->operating_hours,
                'users'     => implode(",", $request->users),
                'leader' =>  implode(",", $request->leader),
                'description' => $request->description,
                'created_by' => \Auth::user()->createId(),
                'company_id' => $request->company_id,
            ];
           // dd($post);
            Group::create($post);

            return redirect()->route('admin.group')->with('success', __('Group created successfully'));


    }

     public function edit($id)
     {
        $userObj = \Auth::user();
        $users = User::where('parent',\Auth::user()->createId())->get()->pluck('name','id');
        $users->users  = explode(',', $userObj->users);
        $opeatings = OperatingHours::where('created_by',\Auth::user()->createId())->get()->pluck('name','id');

        $leader = User::where('parent',\Auth::user()->createId())->get()->pluck('name','id');
        $leader->leader  = explode(',', $userObj->leader);
        $groups = Group::find($id);
        $companies = Company::all();
        return view('admin.groups.edit',compact('groups','users','leader','opeatings','companies'));


     }

     public function update(Request $request, $id)
     {
         $userObj = \Auth::user();
     
         if (\Auth::user()->parent == 0) {
             // Find the group by ID
             $groups = Group::find($id);
             
             // Validate and update group details
             $groups->name = $request->name;
             $groups->email = $request->email;
             $groups->operating_hours = $request->operating_hours;
             $groups->description = $request->description;
             $groups->company_id = $request->company_id;
     
             // Ensure that $request->users and $request->leader are arrays
             if (is_array($request->users)) {
                 $groups->users = implode(",", $request->users);
             } elseif (is_string($request->users)) {
                 // If $request->users is a string, split it into an array
                 $groups->users = implode(",", explode(",", $request->users));
             }
     
             if (is_array($request->leader)) {
                 $groups->leader = implode(",", $request->leader);
             } elseif (is_string($request->leader)) {
                 // If $request->leader is a string, split it into an array
                 $groups->leader = implode(",", explode(",", $request->leader));
             }
     
             // Save the updated group
             $groups->save();
     
             // Redirect with success message
             return redirect()->route('admin.group')->with('success', __('Group updated successfully'));
         } else {
             return redirect()->back()->with('error', __('Permission denied.'));
         }
     }
     

     public function destroy($id)
      {
        $user = \Auth::user();
         $groups = Group::find($id);
            $groups->delete();
            return redirect()->back()->with('success', __('Group deleted successfully'));

      }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\User\User;
use Illuminate\Http\Request;
use App\Mail\Users\banedUser;
use App\Mail\Users\DeleteUser;
use App\Mail\Users\unbanedUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
     //index
     public function index()
     {
         $template='defaulte';
         $page_title="الموظفين";
         $users=User::orderBy('id', 'desc')->paginate(10);
         // dd($users);
         return view('admins.super-admin.users',compact('template','users','page_title'))->render();
     }
     //user
    public function user($email)
    {
        $template='defaulte';
        $page_title="معلومات الموظف";
        $user=User::where('email',$email)->first();
        return view('admins.super-admin.user',compact('template','user','page_title'));
    }
     //pagination
     public function pagination()
     {
        $template='defaulte';
        $page_title="الموظفين";
        $users=User::orderBy('id', 'desc')->paginate(10);
        // dd($users);
        return view('admins.super-admin.components.users.tables.model1',compact('template','users','page_title'))->render(); 
     }
     //search
     public function search(Request $request)
     {
         $template='defaulte';
         $page_title="الموظفين";
         $users=User::where('name','like','%'.$request->search_string.'%')
         ->orwhere('phone','like','%'.$request->search_string.'%')
         ->orwhere('email','like','%'.$request->search_string.'%')
         // ->orwhere('store_name','like','%'.$request->search_string.'%')
         ->orderBy('id', 'desc')
         ->paginate(10);
         // dd($users);
         if($users->count()>=1)
         {
             return view('admins.super-admin.components.users.tables.model1',compact('template','users','page_title'))->render();   
         }else
         {
             return response()->json(['status' => 'nothing',]);
         }
     }
     // ban user
     public function banUser($id)
     {
         //get user
         $user=User::findOrFail($id);
         //ban user
         $user->status='Inactive';
         $user->update();
         //send mail to user about this user ban
         Mail::to($user->email)->queue(new banedUser($user));
         return response()->json(['success' => true,'message' => 'the user has id='.$id.'is baned successfully']);
     }
     // ban user
     public function unbanUser($id)
     {
         //get user
         $user=User::findOrFail($id);
         //ban user
         $user->status='Active';
         $user->update();
         //send mail to user about this user ban
         Mail::to($user->email)->queue(new unbanedUser($user));
         return response()->json(['success' => true,'message' => 'the user has id='.$id.'is baned successfully']);
     }
     //destroy
     public function destroy($id)
     {
         //get user folder name and delete
         $user=User::findOrFail($id);
         $user_folder=$user->store_name;
         //if folder exists delete it
         Storage::deleteDirectory('public/users/'.$user_folder);
         //infor supper admin and user about this delete
         Mail::to($user->email)->send(new DeleteUser($user));
         $user->delete();
         //return success delete
         return response()->json(['success'=> true,'id' => $id]);    
     }
}

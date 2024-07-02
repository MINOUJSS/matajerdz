<?php

use App\Models\User\User;

// last seen user
function set_user_lastseen(){
    //get user from database
    $user_id=Auth::guard('web')->user()->id;
    $user=User::where('id',$user_id)->first();
    //update user last seen column
    $user->last_seen=date('Y-m-d H:i:s');
    $user->update();
}
//
function get_user_lastseen($user_id){
   //get user from database
   $user=User::where('id',$user_id)->first(); 
   if($user->last_seen != null)
   {
    return $user->last_seen; 
   }elseif($user->created_at !=null)
   {
    return $user->created_at;
   }else
   {
    return 'created from seeder';
   }
}
// is active user
function isActiveUser($id){
    //get user
    $user=User::findOrFail($id);
    if($user->status=='Active')
    {
        return true;
    }else
    {
        return false;
    }
}
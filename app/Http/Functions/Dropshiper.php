<?php

use App\Models\Dropshiper\Dropshiper;
// last seen dropshiper
function set_dropshiper_lastseen()
{
    //get dropshiper from database
    $dropshiper_id=Auth::guard('dropshiper')->user()->id;
    $dropshiper=Dropshiper::where('id',$dropshiper_id)->first();
    //update dropshiper last seen column
    $dropshiper->last_seen=date('Y-m-d H:i:s');
    $dropshiper->update();
}
//
function get_dropshiper_lastseen($dropshiper_id)
{
   //get dropshiper from database
   $dropshiper=Dropshiper::where('id',$dropshiper_id)->first(); 
   if($dropshiper->last_seen != null)
   {
    return $dropshiper->last_seen; 
   }elseif($dropshiper->created_at !=null)
   {
    return $dropshiper->created_at;
   }else
   {
    return 'created from seeder';
   }
}
// is active dropshiper
function isActiveDropshiper($id)
{
    //get dropshiper
    $dropshiper=Dropshiper::findOrFail($id);
    if($dropshiper->status=='Active')
    {
        return true;
    }else
    {
        return false;
    }
}
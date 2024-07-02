<?php

use App\Models\LocalLivereur\LocalLivereur;
// last seen l_livereur
function set_l_livereur_lastseen()
{
    //get l_livereur from database
    $l_livereur_id=Auth::guard('local_livereur')->user()->id;
    $l_livereur=LocalLivereur::where('id',$l_livereur_id)->first();
    //update l_livereur last seen column
    $l_livereur->last_seen=date('Y-m-d H:i:s');
    $l_livereur->update();
}
//
function get_l_livereur_lastseen($l_livereur_id)
{
   //get l_livereur from database
   $l_livereur=LocalLivereur::where('id',$l_livereur_id)->first(); 
   if($l_livereur->last_seen != null)
   {
    return $l_livereur->last_seen; 
   }elseif($l_livereur->created_at !=null)
   {
    return $l_livereur->created_at;
   }else
   {
    return 'created from seeder';
   }
}
// is active l_livereur
function isActiveLocalLivereur($id)
{
    //get l_livereur
    $l_livereur=LocalLivereur::findOrFail($id);
    if($l_livereur->status=='Active')
    {
        return true;
    }else
    {
        return false;
    }
}
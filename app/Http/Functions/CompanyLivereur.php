<?php

use App\Models\CompanyLivereur\CompanyLivereur;
// last seen c_livereur
function set_c_livereur_lastseen()
{
    //get c_livereur from database
    $c_livereur_id=Auth::guard('company_livereur')->user()->id;
    $c_livereur=CompanyLivereur::where('id',$c_livereur_id)->first();
    //update c_livereur last seen column
    $c_livereur->last_seen=date('Y-m-d H:i:s');
    $c_livereur->update();
}
//
function get_c_livereur_lastseen($c_livereur_id)
{
   //get c_livereur from database
   $c_livereur=CompanyLivereur::where('id',$c_livereur_id)->first(); 
   if($c_livereur->last_seen != null)
   {
    return $c_livereur->last_seen; 
   }elseif($c_livereur->created_at !=null)
   {
    return $c_livereur->created_at;
   }else
   {
    return 'created from seeder';
   }
}
// is active c_livereur
function isActiveCompanyLivereur($id)
{
    //get c_livereur
    $c_livereur=CompanyLivereur::findOrFail($id);
    if($c_livereur->status=='Active')
    {
        return true;
    }else
    {
        return false;
    }
}
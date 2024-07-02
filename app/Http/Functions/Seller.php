<?php
use App\Models\Seller\Seller;

// last seen seller
function set_seller_lastseen()
{
    //get seller from database
    $seller_id=Auth::guard('seller')->user()->id;
    $seller=Seller::where('id',$seller_id)->first();
    //update seller last seen column
    $seller->last_seen=date('Y-m-d H:i:s');
    $seller->update();
}
//
function get_seller_lastseen($seller_id)
{
   //get seller from database
   $seller=Seller::where('id',$seller_id)->first(); 
   if($seller->last_seen != null)
   {
    return $seller->last_seen; 
   }elseif($seller->created_at !=null)
   {
    return $seller->created_at;
   }else
   {
    return 'created from seeder';
   }
}
// is active seller
function isActiveSeller($id)
{
    //get seller
    $seller=Seller::findOrFail($id);
    if($seller->status=='Active')
    {
        return true;
    }else
    {
        return false;
    }
}
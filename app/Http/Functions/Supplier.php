<?php

use App\Models\Supplier\Supplier;

// last seen supplier
function set_supplier_lastseen()
{
    //get supplier from database
    $supplier_id=Auth::guard('supplier')->user()->id;
    $supplier=Supplier::where('id',$supplier_id)->first();
    //update supplier last seen column
    $supplier->last_seen=date('Y-m-d H:i:s');
    $supplier->update();
}
//
function get_supplier_lastseen($supplier_id)
{
   //get supplier from database
   $supplier=Supplier::where('id',$supplier_id)->first(); 
   if($supplier->last_seen != null)
   {
    return $supplier->last_seen; 
   }elseif($supplier->created_at !=null)
   {
    return $supplier->created_at;
   }else
   {
    return 'created from seeder';
   }
}
// is active supplier
function isActiveSupplier($id)
{
    //get supplier
    $supplier=Supplier::findOrFail($id);
    if($supplier->status=='Active')
    {
        return true;
    }else
    {
        return false;
    }
}
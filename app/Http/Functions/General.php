<?php
function getWilayaName($wilaya_id)
{
    $wilaya=App\Models\Wilaya\Wilaya::where('id',$wilaya_id)->first();
    return $wilaya->ar_name;
}
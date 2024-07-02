<?php

namespace App\Models\Baladia;

use Illuminate\Database\Eloquent\Model;

class Baladia extends Model
{
    //
    protected $fillable=[
        'ar_name','en_name','zip_code',
    ];
    //
    public function dayra()
    {
        return $this->belongsTo('App\Models\Dayra\Dayra');
    }
}

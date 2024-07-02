<?php

namespace App\Models\Wilaya;

use Illuminate\Database\Eloquent\Model;

class Wilaya extends Model
{
    //
    protected $fillable = [
        'ar_name','en_name','zip_code',
    ];
    // -------------wilaya relations sheep------
    // dayra relationships
    public function dayras()
    {
        return $this->HasMany('App\Models\Dayra\Dayra');
    }
    // supplier relationships
    public function suppliers()
    {
        return $this->HasMany('App\Models\Supplier\Supplier');
    }
}

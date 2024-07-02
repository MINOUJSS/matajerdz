<?php

namespace App\Models\Super_Admin;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable=[
        'title', 'description', 'link', 'read', 'type',
    ];
}

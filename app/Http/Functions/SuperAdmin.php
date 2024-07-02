<?php

use App\Models\Super_Admin\Notification;
//no read notifications
function no_read_notifications(){
    $notification=Notification::latest()->where('read',FALSE)->get();
    return $notification;
}
//notifications
function notifications(){
    $notification=Notification::latest()->paginate(10);
    return $notification;
}
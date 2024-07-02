<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Super_Admin\Notification;

class NotificationController extends Controller
{
    //index
    public function index()
    {
        $template='defaulte';
        $page_title="الإشعارات";
        $nots=Notification::orderBy('id', 'desc')->paginate(10);
        return view('admins.super-admin.notifications',compact('template','nots','page_title'));
    }
    //read all
    public function read_all(){
        $notifications=Notification::all();
        foreach($notifications as $note)
        {
                $note->read=true;
                $note->update();
        }
        return response()->json(['success'=>true]);
    }
}

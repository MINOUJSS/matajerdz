<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Super_Admin\Super_Admin;

class AdminController extends Controller
{
    //
    public function index()
    {
        $template='defaulte';
        $page_title="لوحة التحكم";
        return view('admins.super-admin.dashboard',compact('template','page_title'));
    }
}

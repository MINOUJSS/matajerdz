<?php

namespace App\Http\Controllers\Dropshiper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DropshiperController extends Controller
{
    //
    public function index()
    {
        $template='defaulte';
        $page_title="لوحة التحكم";
        return view('admins.dropshiper.dashboard',compact('template','page_title'));
    }
}

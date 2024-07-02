<?php

namespace App\Http\Controllers\LocalLivereur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocalLivereurController extends Controller
{
    //
    public function index()
    {
        $template='defaulte';
        $page_title="لوحة التحكم";
        return view('admins.local_livereur.dashboard',compact('template','page_title'));
    }
}

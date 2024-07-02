<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function index()
    {
        $template='defaulte';
        return view('store.demo.blog',compact('template'));
    }
}

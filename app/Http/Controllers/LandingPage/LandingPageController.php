<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    //
    public function index()
    {
        $template="defaulte";
        return view('LandingPage.index', compact('template'));
    }
}

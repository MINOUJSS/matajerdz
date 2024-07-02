<?php

namespace App\Http\Controllers\CompanyLivereur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyLivereurController extends Controller
{
    //
    public function index()
    {
        $template='defaulte';
        $page_title="لوحة التحكم";
        return view('admins.company_livereur.dashboard',compact('template','page_title'));
    }
}

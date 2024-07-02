<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    //
    public function index()
    {
        $template='defaulte';
        $page_title="لوحة التحكم";
        return view('admins.seller.dashboard',compact('template','page_title'));
    }
}

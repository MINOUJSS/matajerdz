<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function test()
    {
        return 'This Is Seller subdomain : '.$subdomain;
    }
}

<?php

namespace App\Http\Controllers\supplier;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    //
    public function test($subdomain)
    {
        return 'This Is Supplier subdomain : '.$subdomain.' url:'.URL::to('/');
    }
}

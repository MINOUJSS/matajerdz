<?php

namespace App\Http\Controllers\Dropshiper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function test($subdomain)
    {
        return 'This Is Dropshiper subdomain : '.$subdomain;
    }
}

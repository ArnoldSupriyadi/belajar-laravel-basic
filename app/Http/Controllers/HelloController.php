<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function hello(Request $request):string 
    {
        $request->path();
        $request->url();
        $request->fullUrl();
        return "Hello World";
    }

    public function request(Request $request):string 
    {
        return $request->path() . PHP_EOL .
        $request->url() . PHP_EOL .
        $request->fullUrl() . PHP_EOL .
        $request->method() . PHP_EOL .
        $request->header('Aaccept') . PHP_EOL ;
    }
}

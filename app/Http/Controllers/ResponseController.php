<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResponseController extends Controller
{
    public function response(Request $request):Response
    {
        return \response();
    }
}

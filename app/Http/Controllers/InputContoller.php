<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InputContoller extends Controller
{
    public function hello(Request $request):string 
    {
        $name = $request->input('name');
        return "Hello ". $name;
    }

    public function helloFirstName(Request $request):string
    {
        $firstName = $request->input('first.name');
        return "hello $firstName";
    }

    public function helloInput(Request $request):string {
        $input = $request->input();
        return json_encode($input);
    }

    public function arrayInput(){
        $this->post('/input/hello/array', [
            'products' => [
                ['name' => 'Apple Macbook Pro M1'],
                ['name' => 'Samsung Galaxy S ']
            ]
            ])->assertText('Apple Macbook Pro')->assertSeeText('Samsung Galaxy S');
    }
}

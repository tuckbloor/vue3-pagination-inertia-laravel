<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;


class TestController extends Controller
{
    public function test(Request $request)
    {


        //get the data for the map list page
        $data = \DB::table('test')->paginate(5);

        $data = json_decode(json_encode($data),1);


        //Edit This for your requirements
        if($request->method() === 'GET') {

            return Inertia::render('Test', ['pageData' => $data]);
        }
        else {

            return ['pageData'=> $data];
        }
    }

}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{



    public function index()
    {
        return view('frontend.home');
    }


    public function redirect()
    {
        $usertype = Auth::user()->usertype;

        if ($usertype=='1') {

            return view('admin.home');

        }

        else{

            return view('frontend.home');
        }
    }
}

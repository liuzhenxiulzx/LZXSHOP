<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Admin_IndexController extends Controller
{
    public function Index(){
        return view('admin.index.index');
    }

    public function Home(){
        return view('admin.index.home');
    }
}

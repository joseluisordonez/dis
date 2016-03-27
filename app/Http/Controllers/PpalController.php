<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PpalController extends Controller
{
    public function index(){
    	return view('index');
    }
    public function nosotros(){
    	return view('nosotros');
    }
    public function contacto(){
    	return view('contacto');
    }
    public function admin(){
    	return view('admin.admin');
    }
}

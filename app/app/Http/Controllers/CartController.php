<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
	public function home(){
		return view('page.home');
	}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;

class CartController extends Controller
{
	public function home(){
		return view('page.home');
	}

	public function customers(){
		$users = User::all();

		$customers = [];
		foreach($users as $user){
			if ($user->hasRole('customer')){
				$customers[] = $user;
			}
		}

		return view('page.customers.list')->with('customers', $customers);
	}

	public function orders($customerID){
		return view('page.orders.index')->with('orders', Order::where('user_id', $customerID)->get());
	}
}

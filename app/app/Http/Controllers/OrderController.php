<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Order;
use App\Product;
use App\OrderDetail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole('admin'))
        {
            return view('page.orders.index')->with('orders', Order::all());
        }
        else
        {
            return view('page.orders.index')->with('orders', Order::all()->where('user_id', Auth::user()->id));
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.orders.create')->with('products', Product::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = [];


        for ($i = 0; $i < intval($request->input('count')); $i++){
            $validate['product'.$i] = 'required';
            $validate['quantity'.$i] = 'required';
        }

        $this->validate($request, $validate);

        $data = [];
        for ($i = 0; $i < intval($request->input('count')); $i++)
        {
            if (isset($data[$request->input('product' . $i)]))  {
                $data[$request->input('product' . $i)] += intval($request->input('quantity' . $i));
            }
            else
            {
                $data[$request->input('product' . $i)] = intval($request->input('quantity' . $i));
            }

            $product = Product::where('name', $request->input('product' . $i))->get()->get(0);
            if ($data[$request->input('product' . $i)] > $product->quantity){
                $error = \Illuminate\Validation\ValidationException::withMessages([
                   'product' . $i => ['Only ' . $product->quantity . ' quantity of ' . $request->input('product' . $i) . ' is available please try again']
                ]);
                error_log(json_encode($data));
                throw $error;
            }
        }
        
        $user = Auth::user();

        $order = new Order();
        $order->user_id = $user->id;
        $order->save();

        foreach ($data as $product_name => $quantity){
            $product = Product::where('name', $product_name)->get()->get(0);

            $order_detail = new OrderDetail();
            $order_detail->product_id = $product->id;
            $order_detail->order_id = $order->id;
            $order_detail->quantity = $quantity;
            $order_detail->price = $product->price;
            $order_detail->save();

            $product->quantity = $product->quantity - $quantity;
            $product->save();
        }

        return redirect('/orders/'. $order->id . '/')->with('success', 'Order Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('page.orders.show')->with('order', Order::find($id)); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

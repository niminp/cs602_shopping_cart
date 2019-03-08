<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class APIProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $url_product = null;
        $url_product = $request->get('product');
        $url_min_price = $request->get('minprice');
        $url_max_price = $request->get('maxprice');

        if ($url_product != null){
            $products = Product::where('name', $request->get('product'))->get();
        }
        else if ($url_min_price != null and $url_min_price !=null){
            try{
                $min = intval($url_min_price);
                $max = intval($url_max_price);

                $products = Product::where('price', '<', $max)->where('price', '>', $min)->get();

            } catch (Exception $e) {
                return "Invalid price range";
            }
            
        }
        else
        {
            $products = Product::all();
        }

        $products_array = [];
        foreach ($products as $product){
            $products_array[] = [
                'id' => $product->id,
                'name' => $product->name,
                'description' => $product->description,
                'price' => $product->price,
                'quantity' => $product->quantity,
                'created_at' => $product->created_at,
                'updated_at' => $product->updated_at,
            ];
        };

        $request_type = $this->get_request_type($request);

        if ($request_type == 'HTML' || $request_type == 'JSON')
        {
            return response()->json($products_array);
        }
        else if ($request_type == 'XML')
        {
            return response()->make($this->generate_product_xml($products_array ,'product'), '200')->header('Content-Type', 'text/xml');
        }
        else
        {
            return "Invalid Content-Type";
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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

    private function get_request_type(Request $request){
        $request_string = (string) $request;
        
        if (strpos($request_string, 'text/html') !== false) {
            return 'HTML';
        }
        else if (strpos($request_string, 'application/json') !== false) {
            return 'JSON';
        }
        else if (strpos($request_string, 'application/xml') !== false) {
            return 'XML';
        }
        else{
            return null;
        }
    }

    private function generate_product_xml(Array $products, $type){
        $xml = '<?xml version="1.0"?><' . $type . 's>';
        
        foreach ($products as $key => $value) {
            $xml .= '<' . $type . '>';
            foreach ($value as $k => $v) {
                $xml .= "<" . $k . ">" . $v . "</" . $k . ">";
            }
            $xml .= '</' . $type . '>';
        }
        
        $xml .= '</' . $type . 's>';

        return $xml;
    }
}

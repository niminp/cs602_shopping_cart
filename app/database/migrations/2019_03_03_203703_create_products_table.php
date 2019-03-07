<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->longText('description');
            $table->float('price', 8, 2);
            $table->integer('quantity');
            $table->timestamps();
        });

        $products_data = [
            array(
                'name' => 'Absolute Vodka',
                'description' => 'Absolute Vodka description',
                'price' => 25.99,
                'quantity' => 20
            ),
            array(
                'name' => 'Merlot Wine',
                'description' => 'Merlot Wine description',
                'price' => 15.99,
                'quantity' => 20
            ),
            array(
                'name' => 'Kettle One Vodka',
                'description' => 'Kettle One description',
                'price' => 30.99,
                'quantity' => 20
            ),
            array(
                'name' => 'Bacardi Rum',
                'description' => 'Bacardi Rum description',
                'price' => 20.99,
                'quantity' => 20
            ),
            array(
                'name' => 'Johney Walker Black Wiskey',
                'description' => 'Johney Walker Black Wiskey description',
                'price' => 40.99,
                'quantity' => 20
            ),
            array(
                'name' => 'Samuel Adams Beer',
                'description' => 'Samuel Adams Beer description',
                'price' => 12.99,
                'quantity' => 20
            ),
            array(
                'name' => 'Harpoon Beer',
                'description' => 'Harpoon Beer description',
                'price' => 14.99,
                'quantity' => 20
            )
        ];

        // Insert some stuff
        DB::table('products')->insert($products_data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}

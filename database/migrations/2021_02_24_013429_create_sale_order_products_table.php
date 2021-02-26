<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_order_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sale_order_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('quantity');
            $table->decimal('value', 10, 2);
            $table->decimal('total', 10, 2);
            $table->timestamps();

            $table->foreign('sale_order_id', 'sale_order_sale_order_products_foreign')
                ->references('id')->on('sale_orders')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('product_id', 'product_id_sale_order_products_foreign')
                ->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sale_order_products');
    }
}

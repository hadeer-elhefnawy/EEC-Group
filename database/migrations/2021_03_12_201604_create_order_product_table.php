<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_product', function (Blueprint $table) {
            $table->foreignid("product_id")->on("products")->ondelete("cascade");
            $table->foreignid("order_id")->on("orders")->ondelete("cascade");
            $table->foreignid("category_id")->on("category")->ondelete("cascade");
            $table->double('price');
            $table->integer('quantity');
            $table->text('comment')->nullable();




        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_product');
    }
}

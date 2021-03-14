<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignid("product_id")->on("products")->ondelete("cascade");
            $table->foreignid("department_id")->on("departments")->ondelete("cascade");
            $table->foreignid("section_id")->on("sections")->ondelete("cascade");
            $table->foreignid("user_id")->on("users")->ondelete("cascade");
            $table->double('total_price');
            $table->string('order_number')->nullable()->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}

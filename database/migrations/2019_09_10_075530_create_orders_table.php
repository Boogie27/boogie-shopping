<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->unsignedBigInteger("user_id")->unsigned()->nullable();
            $table->foreign("user_id")->references("id")->on("users")->onUpdate("cascade")->onDelete("set null");
          
            $table->string("name");
            $table->string("address");
            $table->string("state");
            $table->string("country");
            $table->string("phone");
            $table->integer("billing_total");
            $table->boolean("shipped")->default(false);
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

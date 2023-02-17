<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
   public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->unsigned();
			$table->bigInteger('user_id')->unsigned();
            $table->integer('quantity');
            $table->double('price');
            $table->double('total');
			$table->dateTime('date_sale');
            $table->timestamps();
            $table->softDeletes();


            $table->foreign('product_id')
				->references('id')
				->on('products')
				->onDelete('cascade');

			$table->foreign('user_id')
				->references('id')
				->on('users')
				->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->decimal('price', 5 , 2);
            $table->decimal('discount', 5 , 2)->nullable();
            $table->string('image');
            $table->string('gallery')->nullable();
            $table->string('discription');
            $table->string('statu')->nullable();
            $table->string('ship')->nullable();
            $table->BigInteger('Inventory')->nullable();
            $table->string('discription_long')->nullable();
            $table->unsignedBigInteger('store_id');
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
            $table->unsignedBigInteger('cat_id');
            $table->foreign('cat_id')->references('id')->on('categuries')->onDelete('cascade');

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
        Schema::dropIfExists('products');
    }
}
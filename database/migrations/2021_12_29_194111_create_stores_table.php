<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('name_store');
            $table->longtext('discription')->nullable();
            $table->string('Baner')->nullable();
            $table->string('logo')->nullable();
            $table->string('text_top')->nullable();
            $table->string('face')->nullable();
            $table->string('twite')->nullable();
            $table->string('linkdine')->nullable();
            $table->string('youtube')->nullable();
            $table->string('text_footer')->nullable();
            $table->string('opening_times')->nullable();
            $table->string('close_times')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('adsimage')->nullable();
            $table->string('urlads')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('stores');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('slider')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('social')->nullable();
            $table->string('title_accordion')->nullable();
            $table->longText('disc_accordion')->nullable();
            $table->longText('image_accordion')->nullable();
            $table->string('baner')->nullable();
            $table->string('discfooter')->nullable();

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
        Schema::dropIfExists('settings');
    }
}

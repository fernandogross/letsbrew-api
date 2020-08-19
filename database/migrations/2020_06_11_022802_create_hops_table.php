<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hops', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('name');
            $table->char('origin')->nullable();
            $table->char('characteristics')->nullable();
            $table->char('price')->nullable();
            $table->integer('type');
            $table->integer('form');
            $table->integer('alpha');
            $table->integer('beta');
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
        Schema::dropIfExists('hops');
    }
}

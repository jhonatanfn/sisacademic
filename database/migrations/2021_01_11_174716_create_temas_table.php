<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('slug');
            $table->longText('proposito');
            $table->longText('contenido');
            $table->unsignedBigInteger('programacion_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('programacion_id')->references('id')
            ->on('programacions')->onDelete('cascade');

            $table->foreign('user_id')->references('id')
            ->on('users')->onDelete('cascade');
            
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
        Schema::dropIfExists('temas');
    }
}

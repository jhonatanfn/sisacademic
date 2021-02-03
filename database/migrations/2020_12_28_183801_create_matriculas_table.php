<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatriculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matriculas', function (Blueprint $table) {
            $table->id();
     
            $table->unsignedBigInteger('alumno_id');
            $table->unsignedBigInteger('programacion_id');
            
            $table->foreign('alumno_id')->references('id')
            ->on('alumnos')->onDelete('cascade');
            $table->foreign('programacion_id')->references('id')
            ->on('programacions')->onDelete('cascade');

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
        Schema::dropIfExists('matriculas');
    }
}

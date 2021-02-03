<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsistenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistencias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reunion_id');
            $table->unsignedBigInteger('padre_id');
            $table->enum('status',[1,2,3])->default(1);

            $table->foreign('reunion_id')->references('id')
            ->on('reunions')->onDelete('cascade');
            $table->foreign('padre_id')->references('id')
            ->on('padres')->onDelete('cascade');

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
        Schema::dropIfExists('asistencias');
    }
}

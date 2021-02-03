<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('matricula_id');
            $table->unsignedBigInteger('tipoevaluacion_id');
            $table->unsignedBigInteger('situacion_id');
            $table->float('nota');

            $table->foreign('matricula_id')->references('id')
            ->on('matriculas')->onDelete('cascade');

            $table->foreign('tipoevaluacion_id')->references('id')
            ->on('tipoevaluacions')->onDelete('cascade');

            $table->foreign('situacion_id')->references('id')
            ->on('situacions')->onDelete('cascade');

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
        Schema::dropIfExists('notas');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programacions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('curso_id');
            $table->unsignedBigInteger('docente_id');
            $table->unsignedBigInteger('periodo_id');
            $table->enum('status',[1,2])->default(1);

            $table->foreign('curso_id')->references('id')
            ->on('cursos')->onDelete('cascade');

            $table->foreign('docente_id')->references('id')
            ->on('docentes')->onDelete('cascade');

            $table->foreign('periodo_id')->references('id')
            ->on('periodos')->onDelete('cascade');
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
        Schema::dropIfExists('programacions');
    }
}

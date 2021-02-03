<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();
            $table->longText('mensaje');
            $table->unsignedBigInteger('matricula_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('matricula_id')->references('id')
            ->on('matriculas')->onDelete('cascade');
            
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
        Schema::dropIfExists('consultas');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComunicadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comunicados', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('slug');
            $table->text('extracto')->nullable();
            $table->longText('cuerpo')->nullable();
            $table->enum('status',[1,2])->default(1);
            /* $table->enum('estado',[1,2])->default(1); */

            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('estado_id'); 
            $table->unsignedBigInteger('user_id');

            $table->foreign('categoria_id')->references('id')
            ->on('categorias')->onDelete('cascade');

           $table->foreign('estado_id')->references('id')
            ->on('estados')->onDelete('cascade');

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
        Schema::dropIfExists('comunicados');
    }
}

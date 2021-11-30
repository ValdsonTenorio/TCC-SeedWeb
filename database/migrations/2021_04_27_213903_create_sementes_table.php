<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSementesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sementes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->text('nome_popular')->nullable();
            $table->text('nome_cientifico')->nullable();
            $table->text('especie')->nullable();
            $table->text('genero')->nullable();
            $table->text('causa_da_dormencia')->nullable();
            $table->text('quebra_de_dormencia')->nullable();
            $table->string('imagem')->nullable();
            $table->text('descricao')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sementes');
    }
}

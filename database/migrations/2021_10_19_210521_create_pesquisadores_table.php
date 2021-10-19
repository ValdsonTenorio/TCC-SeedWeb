<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesquisadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesquisadores', function (Blueprint $table) {
            $table->increments('id');
            $table->text('email_institucional');
            $table->text('curriculo_lattes');
            $table->integer('usuario_id');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('situacao')->default(0);
            $table->text('justificativa')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesquisadores');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('produtos');
        Schema::create('produtos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 100);
            $table->decimal('valor', 10, 2);
            $table->integer('quantidade');
            $table->string('tamanho', 100)->nullable();
            $table->text('descricao')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}

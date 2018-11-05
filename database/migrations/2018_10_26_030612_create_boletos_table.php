<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBoletosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boletos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo',30);
            $table->float('valor');
            $table->float('iva');
            $table->date('inicio')->nullable();
            $table->date('fin')->nullable();
            $table->integer('idevento')->unsigned();
            $table->integer('cantidad')->unsigned();
            $table->boolean('activo');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('idevento')->references('id')->on('eventos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('boletos');
    }
}

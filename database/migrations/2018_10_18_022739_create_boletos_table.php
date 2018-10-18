<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateboletosTable extends Migration
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
            $table->string('codigo',150);
            $table->boolean('activo');
            $table->integer('idvalor')->unsigned();
            $table->integer('idevento')->unsigned();
            $table->integer('iduser')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('idvalor')->references('id')->on('valorboletos');
            $table->foreign('idevento')->references('id')->on('eventos');
            $table->foreign('iduser')->references('id')->on('users');
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

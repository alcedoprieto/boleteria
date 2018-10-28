<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBoletosusuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boleto_users', function (Blueprint $table) {
        $table->increments('id');
            $table->string('codigo',30);
            $table->integer('idboleto')->unsigned();
            $table->integer('idusuario')->unsigned()->nullable();
            $table->foreign('idboleto')->references('id')->on('boletos');
            $table->foreign('idusuario')->references('id')->on('users');
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
        Schema::drop('boleto_users');
    }
}

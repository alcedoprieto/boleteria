<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',100);
            $table->string('logo',350);
            $table->string('lugar',250);
            $table->string('descripcion',350);
            $table->string('website',250);
            $table->date('fecha');
            $table->time('hora');
            $table->string('mobile',15);
            $table->string('email',250);
            $table->string('latitud',20)->nullable();
            $table->string('longitud',20)->nullable();
            $table->string('ciudad',50);
            $table->string('poster',250)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('eventos');
    }
}

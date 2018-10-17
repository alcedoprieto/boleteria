<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatevalorboletosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valorboletos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',100);
            $table->string('descripcion',250);
            $table->float('valor');
            $table->float('iva');
            $table->boolean('activo');
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
        Schema::drop('valorboletos');
    }
}

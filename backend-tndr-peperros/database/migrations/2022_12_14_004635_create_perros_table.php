<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perros', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('perro_nombre', 255)->nullable();
            $table->string('perro_imagen', 255)->nullable();
            $table->string('perro_descripcion', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('perros');
        Schema::table('perros', function (Blueprint $table)
        {
            $table->dropColumn('perro_nombre');
            $table->dropColumn('perro_imagen');
            $table->dropColumn('perro_descripcion');
        });
    }
};

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
        Schema::create('tarjetas', function (Blueprint $table) {
            $table->string("num_tarjeta")->primary();
            $table->unsignedBigInteger("id_cliente");
            $table->integer("mes_caducidad");
            $table->integer("anyo_caducidad");
            $table->integer("cvv");
            $table->timestamps();

            $table->foreign("id_cliente")->references("id")->on("users")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarjetas');
    }
};

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
        Schema::create('producto_sucursal', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('producto_id')->nullable()->foreign('producto_id')->references('id')->on('productos')->onDelete('set null');
            $table->unsignedBigInteger('sucursal_id')->nullable()->foreign('sucursal_id')->references('id')->on('sucursals')->onDelete('set null');
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
        Schema::dropIfExists('producto_sucursal');
    }
};
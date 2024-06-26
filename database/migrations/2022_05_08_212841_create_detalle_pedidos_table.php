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
        Schema::create('detalle_pedidos', function (Blueprint $table) {
            $table->id();
            $table->float('precio',9,2);
            $table->integer('cantidad');
            $table->unsignedBigInteger('producto_id')->nullable()->foreign('producto_id')->references('id')->on('productos')->onDelete('set null');
            $table->unsignedBigInteger('pedido_id')->nullable()->foreign('pedido_id')->references('id')->on('pedidos')->onDelete('set null');
            $table->unsignedBigInteger('categoria_id')->nullable()->foreign('categoria_id')->references('id')->on('categorias')->onDelete('set null');
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
        Schema::dropIfExists('detalle_pedidos');
    }
};

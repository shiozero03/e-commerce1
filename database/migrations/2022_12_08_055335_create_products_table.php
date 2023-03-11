<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('id_produk')->AUTO_INCREMENT();
            $table->string('featured_image');
            $table->string('nama_produk');
            $table->string('harga');
            $table->integer('diskon');
            $table->string('spesifikasi');
            $table->string('deskrpisi');
            $table->integer('kuantitas');
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
        Schema::dropIfExists('products');
    }
}

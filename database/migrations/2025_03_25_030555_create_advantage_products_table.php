<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('advantage_products', function (Blueprint $table) {
            $table->id();
            $table->string('ikon');
            $table->string('nama');
            $table->string('isi');
            $table->string('produk');

            // Foreign key kedalam tabel bahasa
            $table->unsignedBigInteger('bahasa_id');
            $table->foreign('bahasa_id')->references('id')->on('languages')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advantage_products');
    }
};

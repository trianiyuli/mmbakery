<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('nama', 30);
        $table->integer('harga');
        $table->string('gambar', 100);
        $table->enum('kategori', ['roti-manis', 'donat', 'cake', 'pizza', 'tart']);
        $table->boolean('unggulan')->default(false);
        $table->text('deskripsi')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

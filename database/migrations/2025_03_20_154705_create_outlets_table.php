<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('outlets', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama outlet
            $table->text('address'); // Alamat outlet
            $table->decimal('lat', 10, 7); // Latitude
            $table->decimal('lng', 10, 7); // Longitude
            $table->timestamps(); // created_at & updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('outlets');
    }
};

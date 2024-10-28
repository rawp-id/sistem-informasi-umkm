<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('umkms', function (Blueprint $table) {
            $table->id();
            $table->string(column: 'nama_usaha');
            $table->string(column: 'pemilik');
            $table->string(column: 'jalan');
            $table->string(column: 'desa');
            $table->string(column: 'kecamatan');
            $table->foreignId(column: 'jenis_usaha_id')->constrained('jenis_usahas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('umkms');
    }
};

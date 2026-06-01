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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('label_id')->constrained('master_label');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('background_id')->constrained('master_background');
            $table->foreignId('studio_id')->constrained('master_studio');
            $table->foreignId('pembayaran_id')->constrained('master_pembayaran');
            $table->foreignId('waktu_id')->constrained('master_waktu');
            $table->foreignId('kota_id')->constrained('master_kota');
            $table->date('tanggal');
            $table->integer('jumlah_orang');
            $table->string('nomor_telepon');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

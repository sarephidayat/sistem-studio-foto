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
        Schema::create('master_studio', function (Blueprint $table) {

            $table->id();

            $table->foreignId('kota_id')
                ->constrained('master_kota')
                ->cascadeOnDelete();

            $table->string('nama');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_studio');
    }
};

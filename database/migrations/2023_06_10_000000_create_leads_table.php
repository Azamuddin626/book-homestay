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
        if (!Schema::hasTable('leads')) {
            Schema::create('leads', function (Blueprint $table) {
                $table->id();
                $table->string('nama_penyewa');
                $table->string('alamat');
                $table->string('telefon');
                $table->string('tujuan');
                $table->string('homestay');
                $table->date('check_in');
                $table->date('check_out');
                $table->integer('dewasa');
                $table->integer('kanak');
                $table->enum('status', ['pending', 'confirmed', 'rejected'])->default('pending');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};

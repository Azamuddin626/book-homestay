<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->enum('tujuan', ['Menginap', 'Kenduri']);
            $table->string('nama_penyewa');
            $table->string('alamat');
            $table->date('check_in');
            $table->date('check_out');
            $table->integer('dewasa');
            $table->integer('kanak');
            $table->enum('homestay', ['Rumah Kayu Merbau', 'Rumah Batu Jati', 'Rumah Batu Meranti']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}

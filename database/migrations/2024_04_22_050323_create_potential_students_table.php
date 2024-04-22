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
        Schema::create('potential_students', function (Blueprint $table) {
            $table->id();
            $table->string('nisn');
            $table->string('nama_lengkap');
            $table->string('nama_panggilan');
            $table->text('alamat');
            $table->string('agama');
            $table->string('asal_smp');
            $table->string('tempat');
            $table->date('tanggal_lahir');
            $table->string('no_telp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('potential_students');
    }
};

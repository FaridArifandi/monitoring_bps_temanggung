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
        Schema::create('tab_kinerjas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kegiatan');
            $table->unsignedBigInteger('tim_kerja_id');
            $table->foreign('tim_kerja_id')->references('id')->on('tim_kerjas')->onDelete('cascade');
            $table->foreignId('user_id');
            $table->date('start_date'); // Tanggal mulai
            $table->date('end_date'); // Tanggal akhir
            $table->integer('target');
            $table->integer('realisasi')->nullable();
            $table->string('satuan');
            $table->string('link_bukti_dukung')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tab_kinerjas');
    }
};

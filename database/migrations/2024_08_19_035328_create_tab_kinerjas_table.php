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
            $table->id(); // Kolom NO (Primary Key)
            $table->string('nama_kegiatan'); // Kolom NAMA KEGIATAN
            // Kolom tim_kerja_id sebagai foreign key yang mengacu ke id di tabel tim_kerjas
            $table->unsignedBigInteger('tim_kerja_id');
            $table->foreign('tim_kerja_id')->references('id')->on('tim_kerjas')->onDelete('cascade');
            $table->string('periode_kegiatan'); // Kolom PERIODE KEGIATAN
            $table->integer('target'); // Kolom TARGET
            $table->integer('realisasi'); // Kolom REALISASI
            $table->string('satuan'); // Kolom SATUAN
            $table->string('link_bukti_dukung'); // Kolom LINK BUKTI DUKUNG
            $table->text('keterangan'); // Kolom KET.
            $table->timestamps(); // Kolom created_at dan updated_at
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

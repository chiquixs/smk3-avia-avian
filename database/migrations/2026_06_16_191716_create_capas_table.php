<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('capas', function (Blueprint $table) {
            $table->id();

            $table->string('kode_capa')->unique();
            $table->string('judul');

            $table->enum('jenis', ['corrective', 'preventive']);

            $table->text('deskripsi_masalah');
            $table->text('tindakan');

            $table->date('target_selesai');

            $table->enum('status', ['open', 'in_progress', 'done', 'closed'])
                ->default('open');

            // RELASI (sesuai sistem kamu)
            $table->foreignId('laporan_insiden_id')
                ->nullable()
                ->constrained('laporan_insidens')
                ->nullOnDelete();

            $table->foreignId('identifikasi_bahaya_id')
                ->nullable()
                ->constrained('identifikasi_bahayas')
                ->nullOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('capas');
    }
};
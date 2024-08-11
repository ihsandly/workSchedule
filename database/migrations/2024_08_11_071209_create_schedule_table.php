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
        Schema::create('schedule', function (Blueprint $table) {
            $table->id();
            $table->foreignId('karyawan_id')->constrained(
                table: 'karyawan',
                indexName: 'schedule_karyawan_id'
            );
            $table->string('posisi');
            $table->date('tanggal');
            $table->string('jam_masuk');
            $table->string('jam_pulang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule');
    }
};

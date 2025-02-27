<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaisTableV2 extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswas')->onDelete('cascade');
            $table->string('mata_pelajaran');
            $table->integer('nilai_tugas');
            $table->integer('nilai_uts');
            $table->integer('nilai_uas');
            $table->decimal('nilai_akhir', 5, 2)->storedAs('(nilai_tugas + nilai_uts + nilai_uas) / 3');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilais');
    }
}

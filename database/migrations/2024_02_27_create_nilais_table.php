<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaisTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('nilais')) {
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
    }

    public function down()
    {
        Schema::dropIfExists('nilais');
    }
} 
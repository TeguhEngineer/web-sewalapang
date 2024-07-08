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
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenissewa_id');
            $table->string('status');
            $table->string('kegiatan');
            $table->date('mulai_sewa');
            $table->enum('hari',['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu']);
            $table->enum('jam',['07.00','08.00','09.00','10.00','11.00','12.00','13.00','14.00','15.00','16.00','17.00','18.00']);
            $table->enum('lama_sewa',['1 Hari','2 Hari','3 Hari','4 Hari','5 Hari','6 Hari','1 Minggu','2 Minggu','3 Minggu','1 Bulan']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};

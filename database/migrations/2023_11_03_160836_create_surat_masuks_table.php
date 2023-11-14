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
        Schema::create('surat_masuks', function (Blueprint $table) {
            $table->id();
            $table->string('nosurat');
            $table->string('noregis');
            $table->integer('role')->default(1);
            $table->string('slug')->unique();
            $table->string('pdf');
            $table->date('tglsurat');
            $table->date('tglditerima');
            $table->string('instansi');
            $table->string('perihal');
            $table->integer('lampiran');
            $table->string('status');
            $table->string('sifat');
            $table->integer('validasi')->nullable();
            $table->date('tglcamat')->nullable();
            $table->mediumText('catcamat')->nullable();
            $table->date('tgldisposisi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_masuks');
    }
};

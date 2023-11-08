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
        Schema::create('surat_keluars', function (Blueprint $table) {
            $table->id();
            $table->string('nosurat');
            $table->foreignId('kasi');
            $table->integer('role')->default(1);
            $table->string('slug')->unique();
            $table->string('pdf');
            $table->date('tglsurat');
            $table->string('perihal');
            $table->integer('lampiran');
            $table->string('sifat');
            $table->integer('validasisekcam')->nullable();
            $table->date('tglsekcam')->nullable();
            $table->mediumText('catsekcam')->nullable();
            $table->date('tgldisposisi')->nullable();
            $table->integer('validasicamat')->nullable();
            $table->date('tglcamat')->nullable();
            $table->mediumText('catcamat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_keluars');
    }
};

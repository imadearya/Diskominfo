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
        Schema::create('korbans', function (Blueprint $table) {
            $table->id();
            $table->string('bencana_id');
            $table->foreign('bencana_id')->references('bencana_id')->on('bencanas')->onDelete('cascade');
            $table->string('NIK');
            $table->string('nama');
            $table->integer('umur');
            $table->string('status');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('korbans');
    }
};

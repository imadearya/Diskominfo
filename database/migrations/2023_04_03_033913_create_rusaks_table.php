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
        Schema::create('rusaks', function (Blueprint $table) {
            $table->id();
            $table->string('bencana_id');
            $table->foreign('bencana_id')->references('bencana_id')->on('bencanas')->onDelete('cascade');
            $table->string('nama');
            $table->integer('total');
            $table->decimal('kerugian', 8, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rusaks');
    }
};

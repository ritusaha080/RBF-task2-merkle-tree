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
        Schema::create('intermediateNode', function (Blueprint $table) {
            $table->id();
            $table->unsignedbigInteger('left_child_id');
            $table->unsignedbigInteger('right_child_id');
            $table->string('hash',64);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('intermediateNode');
    }
};

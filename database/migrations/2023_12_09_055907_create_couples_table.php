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
        Schema::create('couples', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('husband_id');
            $table->uuid('wife_id');
            $table->date('marriage_date')->nullable();
            $table->date('divorce_date')->nullable();
            $table->uuid('manager_id')->nullable();
            $table->timestamps();

            $table->unique(['husband_id', 'wife_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('couples');
    }
};

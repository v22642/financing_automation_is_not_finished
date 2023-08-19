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
        Schema::create('directions_of_expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('name_transformation_id')->constrained('name_transformations');
            $table->string('direction_of_spending')->nullable();
            $table->integer('total_approved')->nullable();
            $table->integer('11_agree')->nullable();
            $table->integer('12_agree')->nullable();
            $table->integer('13_agree')->nullable();
            $table->string('subproject_kpі')->nullable();
            $table->string('name_and_value')->nullable();
            $table->string('plan')->nullable();
            $table->string('fact')->nullable();
            $table->string('abcd')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('directions_of_expenses');
    }
};

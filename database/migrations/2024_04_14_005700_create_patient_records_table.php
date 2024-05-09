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
        Schema::create('patient_records', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('martial_status');
            $table->string('address');
            $table->string('occupation');
            $table->string('gender');
            $table->string('dental_chief_complaint');
            $table->string('birth_place');
            $table->date('date_of_birth');
            $table->timestamps();
            $table->foreignId('user_id')->constrained('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_records');
    }
};

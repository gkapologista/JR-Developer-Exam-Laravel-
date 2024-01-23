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
        Schema::create('patients', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('name'); // Name of the patient
            $table->unsignedBigInteger('brgy_id'); // Foreign key to barangays table
            $table->string('number'); // Contact number of the patient
            $table->string('email')->nullable(); // Email of the patient, nullable
            $table->string('case_type'); // Case type (PUI, PUM, Positive, Negative)
            $table->string('coronavirus_status'); // Coronavirus status (active, recovered, death)
            $table->timestamps(); // Created at and updated at timestamps
        
            // Foreign key constraint
            $table->foreign('brgy_id')->references('id')->on('barangays')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};

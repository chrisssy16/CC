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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employer_id')->constrained('employers') ;// Assuming you have an "employers" table
            $table->string('job_title');
            $table->text('job_description');
            $table->enum('category', [
                'Network Security',
                'Application Security',
                'Cloud Security',
                'Security Operations',
                'Incident Response',
                'Penetration Testing',
                'Cybersecurity Consulting',
                // Add more categories as needed
            ]);
            $table->string('budget_range');
            $table->date('deadline');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};

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
        
       // Example migration file


    Schema::create('freelancers', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained(); // Assuming you have a users table
        $table->string('name');
        $table->string('country');
        $table->string('phone');
        $table->string('job_field');
        $table->text('education');
        $table->string('job_skills');
        $table->string('yearsinindustry')->default(''); // Provide a default value

        $table->text('notable_projects')->nullable();
        $table->text('about');
        $table->string('profile_pic')->nullable();
        $table->timestamps();
    });
}

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('freelancers');
    }
};

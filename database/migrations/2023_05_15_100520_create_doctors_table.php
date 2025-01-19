<?php

use App\Models\Department;
use App\Models\DoctorEducation;
use App\Models\DoctorExperience;
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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 50);
            $table->string('last_name', 50)->nullable();
            $table->string('phone',50)->nullable();
            $table->string('email',50)->unique();
            $table->string('password');
            $table->enum('gender',['male','female','others']);
            $table->string('dob', 50);
            $table->integer('fee');
            $table->string('image')->nullable();
            $table->text('bio')->nullable();
            $table->text('services');
            $table->text('specialization')->nullable();
            $table->foreignIdFor(DoctorEducation::class)->default(0);
            $table->foreignIdFor(DoctorExperience::class)->default(0);
            $table->foreignIdFor(Department::class)->default(0);
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};

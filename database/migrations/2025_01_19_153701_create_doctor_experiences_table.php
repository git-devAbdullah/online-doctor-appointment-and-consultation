<?php

use App\Models\Doctor;
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
        Schema::create('doctor_experiences', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Doctor::class);
            $table->string("designation");
            $table->string("institute");
            $table->string("from")->nullable();
            $table->string("to")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_experiences');
    }
};

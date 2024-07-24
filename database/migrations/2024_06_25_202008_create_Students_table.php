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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string("father_name");
            $table->string("mother_name");
            $table->string("father's_job")->nullable();
            $table->string("mother's_job")->nullable();
            $table->string("allergic")->default('non');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId("bus_id")->constrained("bus");
            $table->foreignId("schedual_id")->constrained("scheduals");
            $table->integer('attendance_days')->default('0');
            $table->integer('absence_days')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parents');
    }
};

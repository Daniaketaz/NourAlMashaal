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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string("user_name");
            $table->string("password");
            $table->string('first_name');
            $table->string("last_name");
            $table ->date("birthdate")->default('2024-06-11');
            $table->integer("mobile");
            $table->string("address")->nullable();
            $table->string("email");
            $table->string("photo")->nullable();
            $table->foreignId('role_id')->constrained('roles');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('username', 100)->unique();
            $table->text('email')->unique();
            $table->string('password', 255);
            $table->rememberToken();
            $table->timestamps();
            // Foreignkey
            $table->foreignId('role_id')->constrained('roles')->onDelete('cascade');
            $table->string('otp', 255)->nullable();
            $table->timestamp('otp_expires_at')->nullable();
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

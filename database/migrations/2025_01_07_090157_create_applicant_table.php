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
        Schema::create('applicant', function (Blueprint $table) {
            $table->string('idApplicant', 50)->primary();
            $table->string('name', 100);
            $table->string('username', 50);
            $table->string('password', 255);
            $table->date('dob')->nullable();
            $table->string('phoneNo', 15);
            $table->string('emailAddress', 50);
            $table->string('address', 100);
            $table->string('motherName', 50);
            $table->string('gender', 25);
            $table->string('profession', 50);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicant');
    }
};

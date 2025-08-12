<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->string('day');
            $table->string('time');
            $table->string('course');
            $table->string('code');
            $table->string('type');
            $table->string('location');
            $table->string('instructor');
            $table->boolean('is_online')->default(false);
            $table->timestamps();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};

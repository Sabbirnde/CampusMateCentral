<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->string('course');
            $table->string('code');
            $table->string('assignment_name');
            $table->float('grade')->nullable();
            $table->float('max_grade')->nullable();
            $table->float('weight')->nullable();
            $table->string('submitted_date')->nullable();
            $table->float('current_grade')->nullable();
            $table->integer('credits')->nullable();
            $table->timestamps();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};

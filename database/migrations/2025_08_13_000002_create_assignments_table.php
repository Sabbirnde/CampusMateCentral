<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subject');
            $table->date('due_date');
            $table->text('description')->nullable();
            $table->string('max_size')->nullable();
            $table->string('allowed_formats')->nullable();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->string('file_path')->nullable();
            $table->string('status')->nullable();
            $table->string('priority')->nullable();
            $table->text('submission_text')->nullable();
            $table->timestamps();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};

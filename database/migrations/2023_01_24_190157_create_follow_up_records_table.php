<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('follow_up_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            $table->string('status');

            $table->string('status_source');
            $table->foreignId('source_id')->constrained('users')->onDelete('cascade');

            $table->text('description_situation')->nullable();
            $table->text('handle_situation')->nullable();
            $table->boolean('show_in_noun')->nullable();



            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('follow_up_records');
    }
};

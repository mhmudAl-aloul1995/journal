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
                Schema::create('researcher_evaluations', function (Blueprint $table) {
            $table->id();
            $table->string('finel_response');
            $table->unsignedBigInteger('research_application_id');
            $table->unsignedBigInteger('evaluator_id');

            $table->string('answer_evaluation_1');
            $table->string('answer_evaluation_2');
            $table->string('answer_evaluation_3');
            $table->string('answer_evaluation_4');
            $table->string('answer_evaluation_5');
            $table->text('note_evaluation_1');
            $table->text('note_evaluation_2');
            $table->text('note_evaluation_3');
            $table->text('note_evaluation_4');
            $table->text('note_evaluation_5');

            $table->foreign('evaluator_id')->references('id')->on('users');
            $table->foreign('research_application_id')->references('id')->on('research_applications');

            $table->timestamps();
            $table->softDeletes();

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('researcher_evaluations');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
//php artisan code:models --table=research_application_notes
return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('research_application_notes', function (Blueprint $table) {
            $table->id();
            $table->string('note');
            $table->string('is_done');
            $table->unsignedBigInteger('research_application_id');
            $table->unsignedBigInteger('evaluator_id');

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

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResearchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('researches', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('category_id');

            $table->unsignedBigInteger('version_id');

            $table->unsignedBigInteger('user_id');
            $table->longText('res_title');
            $table->longText('res_summary');
            $table->longText('res_link');
            $table->string('page_from');
            $table->string('page_to');
            $table->longText('keywords');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('version_id')->references('id')->on('versions');
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bill_details');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_cases', function (Blueprint $table) {
            $table->bigIncrements('id');

            /**
             * Can be one of:
             *   passed
             *   skipped
             *   error
             *   failure
             *   undetermined
             */
            $table->string('result');

            $table->string('suite');
            $table->string('name');

            $table->string('classname')->nullable();

            $table->text('failureReason')->nullable();
            $table->double('time');

            $table->unsignedBigInteger('app_id');
            $table->foreign('app_id')->references('id')->on('apps');

            $table->unsignedBigInteger('submission_id');
            $table->foreign('submission_id')->references('id')->on('submissions');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_results');
    }
}

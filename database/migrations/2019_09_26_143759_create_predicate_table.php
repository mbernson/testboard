<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePredicateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('predicates', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects');

            $table->unsignedBigInteger('component_id');
            $table->foreign('component_id')->references('id')->on('components');

            $table->string('field')->default('name');
            $table->string('operator')->default('equals'); // Equals, contains, starts with, ends with, matches regex
            $table->string('value');

            $table->integer('priority')->default(250);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('predicates');
    }
}

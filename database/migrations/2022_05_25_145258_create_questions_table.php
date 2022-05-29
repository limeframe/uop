<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->integer('creator');
            $table->text('title');
            $table->string('level')->default('easy');
            $table->string('type')->default('truefalse');
            $table->text('corrects')->nullable();
            $table->text('wrongs')->nullable();
            $table->text('posanswers')->nullable();
            $table->integer('approval')->default(0);
            $table->text('approvalModerator')->nullable();
            $table->date('approvalDate')->nullable();
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
        Schema::dropIfExists('questions');
    }
};

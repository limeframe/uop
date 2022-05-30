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
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('erotisi_1')->nullable();
            $table->integer('erotisi_2')->nullable();
            $table->integer('erotisi_3')->nullable();
            $table->integer('erotisi_4')->nullable();
            $table->integer('erotisi_5')->nullable();
            $table->text('apantisi_1')->nullable();
            $table->text('apantisi_2')->nullable();
            $table->text('apantisi_3')->nullable();
            $table->text('apantisi_4')->nullable();
            $table->text('apantisi_5')->nullable();
            $table->text('apot_1')->nullable();
            $table->text('apot_2')->nullable();
            $table->text('apot_3')->nullable();
            $table->text('apot_4')->nullable();
            $table->text('apot_5')->nullable();
            $table->string('pososto')->nullable();
            $table->string('apotelesma')->nullable()->default(0);
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
        Schema::dropIfExists('tests');
    }
};

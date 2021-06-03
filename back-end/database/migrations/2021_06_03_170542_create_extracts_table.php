<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('from');
            $table->foreignId('to');
            $table->string('operation');
            $table->string('type');
            $table->unsignedFloat('value');
            $table->string('description')->nullable();
            $table->timestamps();

            $table->foreign('from')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('to')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('extracts');
    }
}

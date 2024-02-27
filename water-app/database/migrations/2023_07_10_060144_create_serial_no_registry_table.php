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
        Schema::create('serial_no_registry', function (Blueprint $table) {
            $table->bigIncrements('id');
           $table->unsignedBigInteger('sr_id');
            $table->foreign('sr_id')->references('id')->on('seal_registry')->onDelete('cascade');
            $table->string('serial_no');
            $table->string('status')->default('Available');
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
        Schema::dropIfExists('serial_no_registry');
    }
};

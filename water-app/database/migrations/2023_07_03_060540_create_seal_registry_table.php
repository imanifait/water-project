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
        Schema::create('seal_registry', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('batch_no');
            $table->unsignedInteger('serial_start_no');
            $table->unsignedInteger('serial_end_no');
            $table->Integer('quantity')->nullable();
            $table->string('status')->default('instore');
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
        Schema::dropIfExists('seal_registry');
    }
};

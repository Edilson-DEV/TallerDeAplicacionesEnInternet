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
        Schema::create('horarys', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('reservations_id')->nullable();
            $table->foreign('reservations_id')->references('id')
                ->on('reservations')->onDelete('cascade');

            $table->unsignedBigInteger('doctors_id')->nullable();
            $table->foreign('doctors_id')->references('id')
                ->on('doctors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horarys');
    }
};

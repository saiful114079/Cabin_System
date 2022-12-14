<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCabinBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cabin_bookings', function (Blueprint $table) {
            $table->id('booking_id');
            $table->date('booking_date');
            $table->integer('cabin_no');
            $table->enum('shift_type',['Morning','Evening'])->default('Morning');
            $table->integer('surgeon_id');
            $table->integer('petient_id');
            $table->integer('operation_id');
            $table->enum('booking_staus',['avaiable','booking'])->default('avaiable');
            $table->integer('user_id');
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
        Schema::dropIfExists('cabin_bookings');
    }
}

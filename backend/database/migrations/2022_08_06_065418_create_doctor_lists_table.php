<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_lists', function (Blueprint $table) {
            $table->id();
            $table->string('dr_id',10);
            $table->string('dr_name',100);
            $table->integer('consultancy_fee');
            $table->string('dr_phone',60);
            $table->string('dr_email',100);
            $table->string('dr_address',100);
            $table->text('dl_designation');
            $table->text('dl_designation_bn');
            $table->string('dr_photo',50);
            $table->string('org_name',100);
            $table->string('dr_type',30);
            $table->string('room_no',30);
            $table->integer('user_id');
            $table->integer('sync');
            $table->integer('deleted_status');
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
        Schema::dropIfExists('doctor_lists');
    }
}

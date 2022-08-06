<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_lists', function (Blueprint $table) {
            $table->id();
            $table->string('patient_id',30);
            $table->string('patient_name',100);
            $table->string('family_eye_card',15)->nullable();
            $table->string('patient_phone',100);
            $table->string('patient_email',100)->nullable();
            $table->text('patient_address')->nullable();
            $table->string('patient_blood_group',4)->nullable();
            $table->string('patient_age',20)->nullable();
            $table->date('patient_dob',20);
            $table->string('patient_sex',10);
            $table->string('patient_occupation',20)->nullable();
            $table->date('admission_date');
            $table->string('patient_photo',100)->nullable();
            $table->integer('org_referral');
            $table->integer('patient_referral_id');
            $table->string('discount_ratio',20);
            $table->date('create_date');
            $table->integer('patient_status');
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
        Schema::dropIfExists('patient_lists');
    }
}

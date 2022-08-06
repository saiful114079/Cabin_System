<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\PatientList;
use Faker\Generator as Faker;

$factory->define(PatientList::class, function (Faker $faker) {
    return [
        'patient_id' => $faker->Str::random(5),
        'patient_name' => $faker->name,
        'family_eye_card' => 'no',
        'patient_phone' => $faker->unique()->numberBetween(1,20),
        'patient_email' => $faker->unique()->safeEmail,
        'patient_address' => Str::random(40),
        'patient_blood_group' => Str::random(3),
        'patient_age' => $faker->numberBetween(1,20),
        'patient_dob' => $faker->dateTimeBetween('1990-01-01', '2012-12-31')
        ->format('d/m/Y'),
        'patient_sex' => Str::random(5),
        'patient_occupation' => Str::random(5),
        'admission_date' => $faker->dateTimeBetween('1990-01-01', '2012-12-31')
        ->format('d/m/Y'),
        'org_referral' => $faker->unique()->numberBetween(1,20),
        'patient_referral_id' => $faker->unique()->numberBetween(1,20),
        'patient_status' => $faker->unique()->numberBetween(1,20),
        'user_id' => $faker->numberBetween(1,20),
        'discount_ratio' => Str::random(5),
        'create_date' => $faker->dateTimeBetween('1990-01-01', '2012-12-31')
        ->format('d/m/Y'),
    ];
});

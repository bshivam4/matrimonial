<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
//$factory->define(App\User::class, function (Faker\Generator $faker) {
//    static $password;
//
//    return [
//        'name' => $faker->name,
//        'email' => $faker->unique()->safeEmail,
//        'password' => $password ?: $password = bcrypt('secret'),
//        'remember_token' => str_random(10),
//    ];
//});

$factory->define(App\Individual::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'gender' => $faker->randomElement($array = array ('Male','Female')),
        'dob' => $faker->date($format='Y-m-d', $max='1995-06-30'),
        'state' => $faker->randomElement($array = array (
            'Andaman and Nicobar Islands',
            'Andhra Pradesh',
            'Arunachal Pradesh',
            'Uttar Pradesh',
            'Punjab',
            'Haryana',
            'Assam',
            'Bihar',
            'Himachal Pradesh',
            'Kerala',
            'Chandigarh',
            'Chhattisgarh',
            'Delhi'
        )),
        'city' => $faker->city,
        'mobile' => $faker->e164PhoneNumber(),
        'religion' => $faker->randomElement($array = array ('Hindu','Sikh','Muslim','Christian','Buddhist')),
        'marital_status' => $faker->randomElement($array = array ('Never Married','Divorced', 'Widow')),
        'mother_tongue' =>   $faker->randomElement($array = array ('Hindi','Bengali', 'Marathi','Punjabi','Sindhi')),
        'image' =>   $faker->imageUrl($width = 500, $height = 500, 'people'),



    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Car;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'user_type'=>'user',
        'address'=>'kathmandu',
        'phone'=>'9860050467',

    ];
});
$factory->define(Car::class, function (Faker $faker) {
    return [
        'car_name'=>'BMW',
        'car_model'=>'123',
        'car_description'=>'new model car',
        'price'=>'2500',
        'capacity'=>'5',
        'fuel_type'=>'Disel',
        'aircondition'=>'yes',
        'image'=>'testimg',

    ];
});

// $factory->define(App\Car::class,function(Faker $faker){
// 	return [
// 		'car_name'=>'BMW',
//     	'car_model'=>'123',
//     	'car_description'=>'new model car',
//             'price'=>'2500',
//             'capacity'=>'5',
//             'fuel_type'=>'Disel',
//             'aircondition'=>'yes',
//             'image'=>'testimg',
    		
// 	];


});



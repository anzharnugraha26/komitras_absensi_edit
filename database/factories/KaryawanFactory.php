<?php

use Faker\Generator as Faker;

$factory->define(\App\karyawan::class, function (Faker $faker) {
    return [
       'user_id' => 100,
      'nama_lengkap' => $faker->name,
      'nik' => $faker->randomElement(['12','11']),
      'divisi' => $faker->randomElement(['c','p']),
      'email' => $faker->unique()->safeEmail,
      'jenis_kelamin' => $faker->randomElement(['l','p']),
      'alamat' => $faker->address,
    ];
});

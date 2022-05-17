<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder; use DB;
use Faker;
use Illuminate\Support\Str;
class LocationSeeder extends Seeder {
/**
* Run the database seeds. *
* @return void
*/
public function run() {
$faker = Faker\Factory::create('tr_TR'); $a=0;
while ($a <= 10) {
DB::table('locations')->insert([
'name' => $faker->name(),
'tel' => $faker->numberBetween(0, 100),
'city' => $faker->name()
]); $a++; }
} }
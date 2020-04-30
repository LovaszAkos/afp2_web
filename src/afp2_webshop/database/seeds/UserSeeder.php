<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        try{
            DB::table('users')
                ->insert([
                    'name' => 'TEST USER',
                    'date_of_birth' => $faker->date('Y-m-d'),
                    'gender' => 0,
                    'email' => 'test@example.com',
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'billing' => 0,
                    'shipping' => 0
                ]);
        }catch (Exception $e) {}

        for($i=0; $i<50; $i++){
            echo("\rGenerating " . (50-$i) . " more... ");
            $hasShipping = rand(0, 2);
            $shipping = null;
            $billing = null;
            if($hasShipping > 0){
                $shipping = factory(\App\Addresses::class)->create()->id;
                if($hasShipping > 1){
                    $billing = factory(\App\Addresses::class)->create()->id;
                }
            }

            DB::table('users')
                ->insert([
                    'name' => $faker->name,
                    'date_of_birth' => $faker->date('Y-m-d'),
                    'gender' => rand(0,2),
                    'email' => $faker->email,
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'billing' => $billing,
                    'shipping' => $shipping
                ]);
        }echo("\r");
    }
}

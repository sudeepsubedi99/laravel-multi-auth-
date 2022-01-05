<?php

namespace Database\Seeders;

use App\Models\Freelancer\Freelancer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class FreelancerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Freelancer::create([
            'name' => 'Freelancer',
            'email' => 'freelancer@freelancer.com',
            'password' => Hash::make('password'),
        ]);
    }
}

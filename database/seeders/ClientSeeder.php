<?php

namespace Database\Seeders;

use App\Models\Client\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::create([
            'name' => 'Client',
            'email' => 'client@client.com',
            'password' => Hash::make('password'),
            
        ]);
    }
}

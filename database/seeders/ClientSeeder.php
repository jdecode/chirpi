<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
        $client = [
            'name' => 'Client',
            'email' => 'client@client.com',
            'password' => bcrypt('client'),
            'url' => '1client',
        ];
        Client::upsert($client, ['email']);
    }
}

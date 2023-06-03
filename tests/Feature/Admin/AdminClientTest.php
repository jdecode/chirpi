<?php

use App\Models\Admin;
use App\Models\Client;

beforeEach(function () {
    $this->seed();
});

test('Admin can store client', function () {
    $admin = Admin::factory()->create();
    $this->client = Client::factory()->make()->makeVisible('password')->toArray();
    $this->actingAs($admin, 'admin')
        ->post(
            route('admin.clients.store'),
            [
                'name' => $this->client['name'],
                'email' => $this->client['email'],
                'password' => $this->client['password'],
                'password_confirmation' => $this->client['password'],
            ]
        )->assertCreated();
    $this->assertDatabaseHas('clients', ['email' => $this->client['email']]);
})->group('auth', 'adminClient');

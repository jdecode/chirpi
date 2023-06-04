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

test('Admin can see link to show clients', function () {
    $admin = Admin::factory()->create();
    $this->actingAs($admin, 'admin')
        ->get(route('admin.dashboard'))
        ->assertOk()
        ->assertSee('Clients')
        ->assertSee(route('admin.clients.index'))
    ;
})->group('auth', 'adminClient');

test('Admin can see clients', function () {
    $admin = Admin::factory()->create();
    $clients_count = 10;
    $clients = Client::factory()->count($clients_count)->create();
    $this->actingAs($admin, 'admin')
        ->get(route('admin.clients.index'))
        ->assertOk()
        ->assertViewHasAll(['clients'])
        ->assertViewHas(
            'clients',
            function ($clients) use ($clients_count) {
                return $clients->count() === ($clients_count + 1);
            }
        );
    $this->assertDatabaseHas('clients', ['email' => $clients->random()->getAttribute('email')]);
})->group('auth', 'adminClient');

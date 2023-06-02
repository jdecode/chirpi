<?php

use App\Models\Client;
use App\Models\User;
use Database\Factories\UserFactory;

beforeEach(function () {
    $this->seed();
    $this->client = [
        'email' => 'client2@client.com',
        'password' => 'client'
    ];
});

test('client login form can be rendered', function () {
    $response = $this->get(route('client.loginForm'));
    $response->assertOk();
    $response->assertViewIs('client.loginForm');
})->group('client', 'client-login-form');

test('client login form can be submitted', function () {
    $response = $this->post(route('client.login'), [
        'email' => 'client@client.com',
        'password' => 'client',
    ]);
    $response->assertFound();
    $response->assertRedirect(route('client.dashboard'));
})->group('client', 'client-login-form');

test('client dashboard can be rendered', function () {
    $response = $this->actingAs(Client::first(), 'client')->get(route('client.dashboard'));
    $response->assertOk();
    $response->assertViewIs('client.dashboard');
})->group('client', 'client-dashboard');

test('client can logout', function () {
    $response = $this->actingAs(Client::first(), 'client')->post(route('client.logout'));
    $response->assertFound();
    $response->assertRedirect(route('client.loginForm'));
})->group('client', 'client-logout');

test('redirect to dashboard if already logged in', function () {
    $response = $this->actingAs(Client::first(), 'client')->get(route('client'));
    $response->assertFound();
    $response->assertRedirect(route('client.dashboard'));
})->group('client', 'client-login-form');

test('client redirect to login form if not logged in', function () {
    $response = $this->get(route('client.dashboard'));
    $response->assertFound();
    $response->assertRedirect(route('client'));
})->group('client', 'client-dashboard');

test('cannot login with invalid credentials', function () {
    $response = $this->post(route('client.login'), [
        'email' => 'client@client.com',
        'password' => 'invalid',
    ]);
    $response->assertFound();
    $response->assertRedirect(route('client.loginForm'));
    $response->assertSessionHasErrors('email');
})->group('client', 'client-login-form');

test('invalid credentials', function (array $credentials) {
    $this->client = [...$this->client, ...$credentials];
    $response = $this->post(route('client.login'), $this->client);
    $response->assertRedirect(route('home'));
    $response->assertFound();
    $response->assertSessionHasErrors([...array_keys($credentials)]);
})->with(
    [
        'Empty email' => [['email' => '']],
        'Empty password' => [['password' => '']],
        'Invalid email' => [['email' => 'invalid']],
        'Invalid email and password' => [['email' => 'invalid', 'password' => '']],
    ]
)->group('client', 'client-login-form', 'dataset');

test('Logging out user with web guard does not logout user with client guard', function () {
    $this->web_user = [
        'name' => 'John Doe',
        'email' => 'johndoe@lbp.dev',
        'password' => 'password'
    ];
    UserFactory::new()->create($this->web_user);
    $web_user = $this->actingAs(User::first(), 'web')
        ->get(route('dashboard'));
    $client = $this->actingAs(Client::first(), 'client')
        ->get(route('client.dashboard'));
    $web_user->assertOk();
    $client->assertOk();

    $this->actingAs(User::first(), 'web')
        ->post(route('logout'));

    $web_user = $this->get(route('dashboard'));
    $web_user->assertRedirect(route('login'));

    $client = $this->get(route('client.dashboard'));
    $client->assertOk();
})->group('client', 'sessions');

test('Logging out user with client guard does not logout user with web guard', function () {
    $this->web_user = [
        'name' => 'John Doe',
        'email' => 'johndoe@lbp.dev',
        'password' => 'password'
    ];
    UserFactory::new()->create($this->web_user);
    $web_user = $this->actingAs(User::first(), 'web')
        ->get(route('dashboard'));
    $client = $this->actingAs(Client::first(), 'client')
        ->get(route('client.dashboard'));
    $web_user->assertOk();
    $client->assertOk();

    $this->actingAs(Client::first(), 'client')
        ->post(route('client.logout'));

    $web_user = $this->get(route('dashboard'));
    $web_user->assertOk();

    $client = $this->get(route('client.dashboard'));
    $client->assertRedirect(route('client'));
})->group('client', 'sessions');

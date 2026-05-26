<?php

use App\Models\User;

test('login screen can be rendered', function () {
    $response = $this->get(route('login'));

    $response->assertOk();
});

test('users can authenticate using the login screen', function () {
    // Create a user with a known MD5 password in the legacy format
    $user = User::create([
        'user_name' => 'testuser',
        'name' => 'Test User',
        'user_salt' => '',
        'user_password' => md5('password123'),
        'user_akses' => '0',
        'id_balai' => 1,
        'user_status' => 0, // 0 = active
    ]);

    $response = $this->post(route('login.store'), [
        'user_name' => $user->user_name,
        'password' => 'password123',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(route('dashboard', absolute: false));

    // Cleanup
    $user->delete();
});

test('users can not authenticate with invalid password', function () {
    $user = User::create([
        'user_name' => 'testuser_invalid',
        'name' => 'Test User Invalid',
        'user_salt' => '',
        'user_password' => md5('correctpassword'),
        'user_akses' => '0',
        'id_balai' => 1,
        'user_status' => 0,
    ]);

    $this->post(route('login.store'), [
        'user_name' => $user->user_name,
        'password' => 'wrong-password',
    ]);

    $this->assertGuest();

    // Cleanup
    $user->delete();
});

test('inactive users can not authenticate', function () {
    $user = User::create([
        'user_name' => 'testuser_inactive',
        'name' => 'Inactive User',
        'user_salt' => '',
        'user_password' => md5('password123'),
        'user_akses' => '0',
        'id_balai' => 1,
        'user_status' => 1, // 1 = inactive
    ]);

    $this->post(route('login.store'), [
        'user_name' => $user->user_name,
        'password' => 'password123',
    ]);

    $this->assertGuest();

    // Cleanup
    $user->delete();
});

test('users can logout', function () {
    $user = User::create([
        'user_name' => 'testuser_logout',
        'name' => 'Test Logout',
        'user_salt' => '',
        'user_password' => md5('password123'),
        'user_akses' => '0',
        'id_balai' => 1,
        'user_status' => 0,
    ]);

    $response = $this->actingAs($user)->post(route('logout'));

    $response->assertRedirect(route('home'));
    $this->assertGuest();

    // Cleanup
    $user->delete();
});

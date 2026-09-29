<?php

use App\Models\User;

test('guests are redirected to the login page', function () {
    $response = $this->get(route('dashboard'));
    $response->assertRedirect(route('login'));
});

test('authenticated users can visit the dashboard', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->get(route('dashboard'));
    $response->assertOk();
});

test('authenticated users can create and see information on the dashboard', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    $response = $this->post(route('information.store'), [
        'title' => 'Project notes',
        'description' => 'Review the onboarding checklist.',
    ]);

    $response
        ->assertRedirect(route('dashboard'));

    $this->assertDatabaseHas('information', [
        'user_id' => $user->id,
        'title' => 'Project notes',
        'description' => 'Review the onboarding checklist.',
    ]);

    $this->get(route('dashboard'))
        ->assertOk()
        ->assertSee('Project notes')
        ->assertSee('Review the onboarding checklist.');
});

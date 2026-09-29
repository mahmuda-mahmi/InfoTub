<?php

use App\Models\User;

test('authenticated creators can create a post', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    $response = $this->post(route('creator.posts.store'), [
        'title' => 'My first creator post',
        'slug' => 'my-first-creator-post',
        'description' => 'A short post description.',
        'content' => 'The full content of my first creator post.',
        'status' => 'draft',
    ]);

    $response->assertRedirect(route('creator.posts.index'));

    $this->assertDatabaseHas('information', [
        'user_id' => $user->id,
        'title' => 'My first creator post',
        'slug' => 'my-first-creator-post',
        'status' => 'draft',
    ]);
});

<?php

use App\Models\Information;

test('visitors can see published information but not drafts', function () {
    Information::factory()
        ->published()
        ->create([
            'title' => 'Published blog post',
        ]);

    Information::factory()
        ->draft()
        ->create([
            'title' => 'Private draft post',
        ]);

    $response = $this->get(route('posts.index'));

    $response
        ->assertOk()
        ->assertSee('Published blog post')
        ->assertDontSee('Private draft post');
});


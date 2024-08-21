<?php

use App\Enums\TalkType;
use App\Models\User;

test('create a talk', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->post(route('talks.store'), [
            'title' => $title = fake()->sentence,
            'type' => TalkType::KEYNOTE->value,
            'length' => '60 mins',
        ]);

    $response
        ->assertRedirect(route('talks.index'));

    // Talk::where('title', '=', $title)->count();
    $this->assertDatabaseHas('talks', [
        'title' => $title,
    ]);
});

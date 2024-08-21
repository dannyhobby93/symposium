<?php

use App\Enums\TalkType;
use App\Models\Talk;
use App\Models\User;

test('update talk', function () {
    $talk = Talk::factory()->create();

    $response = $this
        ->actingAs($talk->author)
        ->patch(route('talks.update', ['talk' => $talk]), [
            'title' => $title = 'Updated title',
            'type' => TalkType::KEYNOTE->value,
            'length' => '30 mins',
        ]);

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirect(route('talks.show', ['talk' => $talk]));

    $this->assertEquals($title, $talk->refresh()->title);
    // Talk::where('title', '=', $title)->count();
    // $this->assertDatabaseHas('talks', [
    //     'title' => $title
    // ]);
});

test('other user cannot update talk', function () {
    $talk = Talk::factory()->create();
    $originalTitle = $talk->title;
    $otherUser = User::factory()->create();

    $response = $this
        ->actingAs($otherUser)
        ->patch(route('talks.update', ['talk' => $talk]), [
            'title' => 'Updated title',
            'type' => TalkType::KEYNOTE->value,
            'length' => '30 mins',
        ]);

    $response->assertForbidden();

    $this->assertEquals($originalTitle, $talk->refresh()->title);
    // Talk::where('title', '=', $title)->count();
    // $this->assertDatabaseHas('talks', [
    //     'title' => $title
    // ]);
});

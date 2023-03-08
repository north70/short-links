<?php

use App\Domain\Links\Models\Link;
use Tests\ComponentTestCase;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\getJson;
use function Pest\Laravel\postJson;

uses(ComponentTestCase::class)
    ->group('components', 'short-links');

test('links show 200' , function () {

    getJson('/links')
        ->assertOk()
        ->assertViewIs('links');
});

test('links generate 200' , function () {
    $originUrl = 'https://test.com';
    $request = ['origin_url' => $originUrl];

    postJson('/links', $request)
        ->assertOk()
        ->assertViewIs('links')
        ->assertViewHas('shortLink');

    assertDatabaseHas(Link::class,[
        'origin_url' => $originUrl
    ]);
});

test('links generate 422' , function (array $request) {
    postJson('/links', $request)
        ->assertUnprocessable();
})->with([
    'no required param' => [[]],
    'invalid url' => [['origin_url' => 'test']]
]);

test('links redirect 200', function () {
    /** @var Link $link */
    $link = Link::factory()->create();

    getJson("/links/{$link->short_url}")
        ->assertRedirect($link->origin_url);
});
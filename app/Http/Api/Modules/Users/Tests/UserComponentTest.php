<?php

namespace App\Http\Api\Modules\Users\Tests;

use Tests\ComponentTestCase;

use function Pest\Laravel\getJson;

uses(ComponentTestCase::class);
uses()->group('component', 'users');

test('GET /', function () {
    getJson('/')
        ->assertOk();
});

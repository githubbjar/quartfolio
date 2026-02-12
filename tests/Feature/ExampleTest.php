<?php

use function Pest\Laravel\get;


test('health endpoint works', function () {
    get('/health')->assertOk()->assertSee('ok');


});


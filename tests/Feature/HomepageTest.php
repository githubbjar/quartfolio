<?php

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('homepage loads and includes expected project data', function () {

    // 4 featured covers should appear on homepage
    Project::factory()->count(4)->create([
        'type' => 'cover',
        'is_featured' => true,
    ]);

    // Extra non-featured covers (affects total count)
    Project::factory()->count(3)->create([
        'type' => 'cover',
        'is_featured' => false,
    ]);

    // Hit the homepage
    $response = $this->get('/');

    $response->assertOk();

    // Assert featured covers passed to view
    $response->assertViewHas('covers', function ($covers) {
        return $covers->count() === 4
            && $covers->every(fn ($p) => $p->type === 'cover' && (bool) $p->is_featured === true);
    });

});

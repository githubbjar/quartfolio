<?php

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\delete;

uses(RefreshDatabase::class);

test('a project can be deleted', function () {

    $project = Project::factory()->create();

    delete(route('project.destroy', $project))
        ->assertRedirect();

    $this->assertDatabaseMissing('projects', [
        'id' => $project->id,
    ]);
});

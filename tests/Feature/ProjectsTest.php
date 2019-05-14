<?php

namespace Tests\Feature;

use App\Project;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function guests_cannot_create_projects()
    {
        //$this->withoutExceptionHandling();

        $attributes = factory(Project::class)->raw();

        $this->post('/projects', $attributes)
            ->assertRedirect('login');
    }

    /** @test */
    public function guests_may_not_view_projects()
    {
        $this->get('/projects')
            ->assertRedirect('login');
    }

    /** @test */
    public function guests_may_not_view_a_single_project()
    {
        $project = factory(Project::class)->create();

        $this->get($project->path())
            ->assertRedirect('login');
    }

    /**
     * @test
     */
    public function a_user_can_create_a_project()
    {
        $this->actingAs(factory(User::class)->create());

        $this->withoutExceptionHandling();

        $attributes = [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'owner_id' => 1,
        ];

        $this->post('/projects', $attributes)->assertRedirect('/projects');

        $this->assertDatabaseHas('projects', $attributes);

        $this->get('projects')
            ->assertSee($attributes['title']);
    }

    /** @test */
    public function a_user_can_view_their_project()
    {
        $this->be(factory(User::class)->create());

        $this->withoutExceptionHandling();

        $project = factory(Project::class)->create([
            'owner_id' => auth()->id()
        ]);

        $this->get($project->path())
            ->assertSee($project->title)
            ->assertSee($project->description);
    }

    /** @test */
    public function an_auth_user_cannot_see_others_projects()
    {
        $this->be(factory(User::class)->create());

        //$this->withoutExceptionHandling();

        $project = factory(Project::class)->create();

        $this->get($project->path())
            ->assertStatus(403);
    }

    /** @test */
    public function a_project_requires_a_title()
    {
        $this->actingAs(factory(User::class)->create());
        //$this->withoutExceptionHandling();

        $attributes = factory(Project::class)->raw([
            'title' => ''
        ]);

        $this->post('/projects', $attributes)
            ->assertSessionHasErrors('title');
    }

    /** @test */
    public function a_project_requires_a_description()
    {
        $this->actingAs(factory(User::class)->create());

        $attributes = factory(Project::class)->raw([
            'description' => ''
        ]);
        $this->post('/projects', $attributes)->assertSessionHasErrors('description');
    }
}

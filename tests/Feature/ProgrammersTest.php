<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Programmer;

class ProgrammersTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_user_can_add_a_programmer()
    {
        $this->withoutExceptionHandling();

        $attributes = Programmer::factory()->raw();

        $this->post('/programmers', $attributes)->assertRedirect('/programmers');
    }

    /** @test */
    public function a_user_can_view_a_programmer()
    {
        $this->withoutExceptionHandling();
        
        $programmer = Programmer::factory()->create();
        $this->get('/programmers/' . $programmer->id)
            ->assertSee($programmer->full_name)
            ->assertSee($programmer->email)
            ->assertSee($programmer->job_title)
            ->assertSee($programmer->address)
            ->assertSee($programmer->year_graduated);
    }
    
    /** @test */
    public function a_user_can_edit_a_programmer()
    {
        $this->withoutExceptionHandling();

        $programmer = Programmer::factory()->create();
        $this->get($programmer->path());

        $updatedProgrammer = Programmer::factory()->raw();

        $this->put('/programmers/' . $programmer->id, $updatedProgrammer);
        
        $this->get('/programmers/' . $programmer->id)
            ->assertSee($updatedProgrammer['full_name'])
            ->assertSee($updatedProgrammer['email'])
            ->assertSee($updatedProgrammer['job_title'])
            ->assertSee($updatedProgrammer['address'])
            ->assertSee($updatedProgrammer['year_graduated']);
        
    }
    
    /** @test */
    public function a_user_can_delete_a_programmer()
    {
        $this->withoutExceptionHandling();

        $programmer = Programmer::factory()->create();
        $this->delete($programmer->path())->assertStatus(204);
        
        
    }
    
    /** @test */
    public function a_programmer_requires_a_name()
    {
        $attributes = Programmer::factory()->raw(['full_name' => '']);
        $this->post('/programmers', $attributes)->assertSessionHasErrors('full_name');
    }

    /** @test */
    public function a_programmer_requires_an_email()
    {
        $attributes = Programmer::factory()->raw(['email' => '']);
        $this->post('/programmers', $attributes)->assertSessionHasErrors('email');
    }
    
    /** @test */
    public function a_programmer_cannot_own_duplicate_email()
    {
        $attributes = Programmer::factory()->raw(['email' => 'test@gmail.com']);
        $this->post('/programmers', $attributes)->assertSessionHasNoErrors();
        
        $attributes = Programmer::factory()->raw(['email' => 'test@gmail.com']);
        $this->post('/programmers', $attributes)->assertSessionHasErrors('email');
    }
        
    /** @test */
    public function a_programmer_requires_an_address()
    {
        $attributes = Programmer::factory()->raw(['address' => '']);
        $this->post('/programmers', $attributes)->assertSessionHasErrors('address');
    }
        
    /** @test */
    public function a_programmer_does_not_require_a_job_title()
    {
        $attributes = Programmer::factory()->raw(['job_title' => '']);
        $this->post('/programmers', $attributes)->assertSessionHasNoErrors();
    }
        
    /** @test */
    public function a_programmer_does_not_require_a_year_graduated()
    {
        $attributes = Programmer::factory()->raw(['year_graduated' => '']);
        $this->post('/programmers', $attributes)->assertSessionHasNoErrors('year_graduated');
    }
    
}

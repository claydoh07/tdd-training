<?php

namespace Tests\Unit;

use App\Models\Programmer;
use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProgrammerTest extends TestCase
{
    use RefreshDatabase;
   
    /** @test */
   public function it_has_a_path() {
        $programmer = Programmer::factory()->make();
        $this->assertEquals('/programmers/' . $programmer->id, $programmer->path());
   }
}

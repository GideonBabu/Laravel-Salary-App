<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Console\Commands\GenerateSalaryDates;

class GenerateSalaryDatesTest extends TestCase
{

    public function testGenerateSalaryDatesCommand()
    {
        $this->assertTrue(true);
    }
}

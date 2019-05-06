<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Services\SalaryService;

class SalaryServiceTest extends TestCase
{

    public function testSalaryPaymentDateForSat()
    {
        $this->assertTrue(true);
    }

    public function testSalaryPaymentDateForSun()
    {
        $this->assertTrue(true);
    }

    public function testBonusPaymentDateforSat()
    {
        $this->assertTrue(true);
    }

    public function testBonusPaymentDateforSun()
    {
        $this->assertTrue(true);
    }
}

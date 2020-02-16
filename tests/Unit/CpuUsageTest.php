<?php

namespace KjellKnapen\ServerStatistics\Tests\Unit;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use KjellKnapen\ServerStatistics\Tests\TestCase;

class CpuUsageTest extends TestCase
{
    /** @test */
    function the_cpu_usage_command_shows_cpu_being_used()
    {
        $data = Artisan::call('server-statistics:cpu-usage');

        $this->assertTrue(gettype($data) == 'integer');
    }
}

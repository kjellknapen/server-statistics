<?php

namespace KjellKnapen\ServerStatistics\Tests\Unit;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use KjellKnapen\ServerStatistics\Tests\TestCase;

class MemoryUsageTest extends TestCase
{
    /** @test */
    function the_memory_usage_command_shows_memory_being_used()
    {
        $data = Artisan::call('server-statistics:memory-usage');

        $this->assertTrue(gettype($data) == 'integer');
    }
}

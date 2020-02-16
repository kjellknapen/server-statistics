<?php

namespace KjellKnapen\ServerStatistics\Tests\Unit;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use KjellKnapen\ServerStatistics\Tests\TestCase;

class CurrentTrafficTest extends TestCase
{
    /** @test */
    function the_current_traffic_command_shows_current_traffic()
    {
        $data = Artisan::call('server-statistics:current-traffic');

        $this->assertTrue(gettype($data) == 'integer');
    }
}

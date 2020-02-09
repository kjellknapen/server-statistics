<?php

namespace KjellKnapen\ServerStatistics\Tests\Unit;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use KjellKnapen\ServerStatistics\Tests\TestCase;

class GetTrafficTest extends TestCase
{
    /** @test */
    function the_get_traffic_command_shows_current_traffic()
    {
        $data = Artisan::call('server-statistics:get-traffic');

        $this->assertTrue(gettype($data) == 'integer');
    }
}

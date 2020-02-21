<?php

namespace KjellKnapen\ServerStatistics\Tests\Unit;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use KjellKnapen\ServerStatistics\Tests\TestCase;

class LoadAvgTest extends TestCase
{
    /** @test */
    function the_load_average_command_shows_load_average()
    {
        $data = Artisan::call('server-statistics:load-average');

        $this->assertTrue(strpos($data, 'Load Average has been saved to the database.') != -1);
    }
}

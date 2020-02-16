<?php

namespace KjellKnapen\ServerStatistics\Tests;

use KjellKnapen\ServerStatistics\ServerStatisticsServiceProvider;
use Illuminate\Support\Facades\Artisan;

class TestCase extends \Orchestra\Testbench\TestCase
{
  public function setUp(): void
  {
    parent::setUp();

    $this->artisan('migrate', ['--database' => 'testing']);
    // additional setup
  }

  protected function getPackageProviders($app)
  {
    return [
      ServerStatisticsServiceProvider::class,
    ];
  }

  protected function getEnvironmentSetUp($app)
  {
    // perform environment setup
  }
}

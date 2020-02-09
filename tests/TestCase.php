<?php

namespace KjellKnapen\ServerStatistics\Tests;

use KjellKnapen\ServerStatistics\ServerStatisticsServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
  public function setUp(): void
  {
    parent::setUp();
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

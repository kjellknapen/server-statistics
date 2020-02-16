<?php

namespace KjellKnapen\ServerStatistics;

use Illuminate\Support\ServiceProvider;
use KjellKnapen\ServerStatistics\Console\MemoryUsage;
use KjellKnapen\ServerStatistics\Console\CpuUsage;
use KjellKnapen\ServerStatistics\Console\DiskUsage;
use KjellKnapen\ServerStatistics\Console\CurrentTraffic;

class ServerStatisticsServiceProvider extends ServiceProvider
{
  public function register()
  {

  }

  public function boot()
  {
    $this->loadMigrationsFrom(__DIR__.'/Storage/migrations');

    if ($this->app->runningInConsole()) {
      // publish config file

      $this->commands([
          CurrentTraffic::class,
          MemoryUsage::class,
          CpuUsage::class,
          DiskUsage::class,
      ]);
    }
  }
}

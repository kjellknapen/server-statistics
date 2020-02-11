<?php

namespace KjellKnapen\ServerStatistics;

use Illuminate\Support\ServiceProvider;
use KjellKnapen\ServerStatistics\Console\GetTraffic;

class ServerStatisticsServiceProvider extends ServiceProvider
{
  public function register()
  {
    //
  }

  public function boot()
  {
    $this->loadMigrationsFrom(__DIR__.'/Storage/migrations');

    if ($this->app->runningInConsole()) {
      // publish config file

      $this->commands([
          GetTraffic::class,
      ]);
    }
  }
}

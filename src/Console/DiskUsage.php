<?php

namespace KjellKnapen\ServerStatistics\Console;

use Illuminate\Console\Command;

use KjellKnapen\ServerStatistics\Models\Statistics;

class DiskUsage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'server-statistics:disk-usage';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Display and save disk space being used on the server';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $output = "";

        exec("df -h --total | grep total", $output);
        $statistic = [];

        if (!empty($output)) {
            $usage = trim(substr($output[0], strpos($output[0], '%') - 3, 3));
            $this->info($usage);

            $statistic = [
              'type' => 'disk',
              'status' => 'success',
              'value' => $usage,
              'message' => $usage . '% of Disk space is being used',
              'output' => $output,
            ];


        } else {
            $statistic = [
              'type' => 'cpu',
              'status' => 'error',
              'value' => null,
              'message' => 'Cpu command failed to execute',
              'output' => json_encode($output),
            ];
        }

        if (!empty($statistic)) {
          $statistic = Statistics::create($statistic);
        } else {
          $this->error('Command failed to execute');
        }
    }
}

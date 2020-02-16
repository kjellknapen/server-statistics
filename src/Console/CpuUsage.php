<?php

namespace KjellKnapen\ServerStatistics\Console;

use Illuminate\Console\Command;

use KjellKnapen\ServerStatistics\Models\Statistics;

class CpuUsage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'server-statistics:cpu-usage';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Display and save cpu being used on the server';

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

        exec("top -b -d1 -n1|grep -i 'Cpu(s)'|head -c21|cut -d ' ' -f2|cut -d '%' -f1", $output);
        $statistic = [];

        if (!empty($output) && gettype($output[0]) == 'integer') {
            $this->info($output[0]);

            $statistic = [
              'type' => 'cpu',
              'status' => 'success',
              'value' => $output[0],
              'message' => $output[0] . '% of Memory is being used',
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

        $statistic = Statistics::create($statistic);
    }
}

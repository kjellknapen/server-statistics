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

        exec("du -sh / 2>/dev/null | grep -P '^[0-9\.]+G'", $output);
        $statistic = [];

        if (!empty($output)) {
            $usage = preg_replace('/[^0-9.]/', '', $output[0]);
            $this->info($usage);

            /*$statistic = [
              'type' => 'cpu',
              'status' => 'success',
              'value' => $output[0],
              'message' => $output[0] . '% of Memory is being used',
              'output' => $output,
            ];*/


        } else {
            /*$statistic = [
              'type' => 'cpu',
              'status' => 'error',
              'value' => null,
              'message' => 'Cpu command failed to execute',
              'output' => json_encode($output),
            ];*/
        }

        //$statistic = Statistics::create($statistic);
    }
}

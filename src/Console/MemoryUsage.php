<?php

namespace KjellKnapen\ServerStatistics\Console;

use Illuminate\Console\Command;

use KjellKnapen\ServerStatistics\Models\Statistics;

class MemoryUsage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'server-statistics:memory-usage';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Display and save memory being used on the server';

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
        // command to use lsof  -i  tcp:443,80 | egrep 'PID|->'

        $output = "";

        exec("free -h | grep Mem", $output);
        $statistic = [];

        if (!empty($output) && strpos($output[0], 'Mem') !== -1) {
            $splitArray = explode('G', str_replace('Mem:', '', preg_replace('/\s+/', '', $output[0])));
            $mem = $splitArray[0];
            $used = $splitArray[1];
            $percent = round((100 * $used )/ $mem, 2);
            $this->info($percent . '% of Memory is being used');

            $statistic = [
              'type' => 'memory',
              'status' => 'success',
              'value' => $percent,
              'message' => $percent . '% of Memory is being used',
              'output' => json_encode([
                'Total' => $mem,
                'Used' => $used,
                'Percent' => $percent
              ]),
            ];


        } else {
            $statistic = [
              'type' => 'memory',
              'status' => 'error',
              'value' => null,
              'message' => 'Memory command failed to execute',
              'output' => json_encode($output),
            ];
        }

        $statistic = Statistics::create($statistic);
    }
}

<?php

namespace KjellKnapen\ServerStatistics\Console;

use Illuminate\Console\Command;

use KjellKnapen\ServerStatistics\Models\Statistics;

class LoadAvg extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'server-statistics:load-average';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Display and save the load average off the server';

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
        $loadStrings = [
          [
            'label' => 'load-1',
            'message' => ' 1 min'
          ],
          [
            'label' => 'load-5',
            'message' => ' 5 min'
          ],
          [
            'label' => 'load-15',
            'message' => ' 15 min'
          ],
        ];

        $loadAvg = sys_getloadavg();

        $statistic = [];
        try {
            if (!empty($loadAvg)) {
                foreach ($loadAvg as $key => $value) {
                    $statistic = [
                      'type' => $loadStrings[$key]['label'],
                      'status' => 'success',
                      'value' => $value,
                      'message' => $value . $loadStrings[$key]['message'],
                      'output' => $loadAvg,
                    ];
                    Statistics::create($statistic);
                }

                $this->info('Load Average has been saved to the database.')

            } else {
                $statistic = [
                  'type' => 'load',
                  'status' => 'error',
                  'value' => null,
                  'message' => 'Load average command failed to execute',
                  'output' => json_encode($loadAvg),
                ];
                Statistics::create($statistic);
                $this->error('Something went wrong during the execution of the command.');

            }
        } catch (\Exception $e) {
          $this->error($e->getMessage());
        }
    }
}

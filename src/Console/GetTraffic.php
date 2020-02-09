<?php

namespace KjellKnapen\ServerStatistics\Console;

use Illuminate\Console\Command;

class GetTraffic extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'server-statistics:get-traffic';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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

        exec("lsof  -i  tcp:443,80 | egrep 'PID|->'", $output);

        if (!empty($output) && strpos($output[0], 'PID')) {
            unset($output[0]);
            $this->info(count($output));
        }
    }
}

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
    protected $signature = 'server-statistics:generate-ssh-pair';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate an ssh key pair you can use to connect to your servers';

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

        exec("ssh-keygen -t rsa -b 4096 -C "your_email@example.com" -f $HOME/.ssh/id_rsa", $output);


        return $output;
    }
}

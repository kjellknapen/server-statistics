<?php

namespace KjellKnapen\ServerStatistics\Console;

use Illuminate\Console\Command;

use KjellKnapen\ServerStatistics\Models\Statistics;

class SshKeygen extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'server-statistics:ssh-keygen';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate an ssh key pair you can use to connect to your servers securely';

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
        $dir =  __DIR__;
        $rootDir = str_replace('src', '', str_replace("Console", '', $dir));

        exec('ssh-keygen -t rsa -b 4096 -C "server-statistics Key" -f ' . $rootDir . '.ssh/id_rsa', $output);


        return $output;
    }
}

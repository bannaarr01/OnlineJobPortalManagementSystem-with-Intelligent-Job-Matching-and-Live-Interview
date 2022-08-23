<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\DumpTitles;

class DumpJobsTitleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dump:jobtitles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run Python Script to dump job titles to csv';

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
     * @return int
     */
    public function handle()
    {   DumpTitles::dumpJobTitles();
        return 0;
    }
}

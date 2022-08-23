<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\DumpUpdatedData;

class UpdateDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'updated:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This dump the latest data from db to csv';

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
    { DumpUpdatedData::getUpdatedData();
        return 0;
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\UpdateModel;

class updatejobMLModelCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:jobmodel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This Command Init the ALS Recommendation Model and Dump it';

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
    { UpdateModel::updateJobModel();
        return 0;
    }
}

<?php

namespace App;

use Auth;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use App\Http\Controllers\JobController;

class ContentBasedRec
{

    public static function getRecommendations()
    {
        //---Gettin d global var(jobTitle)
        $argTitle = config('argTitle');

        $process = new Process(["python3", base_path() . "/app/Python/contentBasedRec.py", "$argTitle"]);
        $process->run();

        return $process->getOutput();

    }

}

<?php

namespace App;

use Auth;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class UpdateModel
{

    public static function updateJobModel()
    {

        $process = new Process(["python3", base_path() . "/app/Python/model.py"]);
        $process->run();


        return $process->getOutput();


    }

}

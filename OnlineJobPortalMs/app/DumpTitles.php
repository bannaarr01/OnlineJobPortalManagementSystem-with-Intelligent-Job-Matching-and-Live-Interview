<?php

namespace App;

use Auth;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;


class DumpTitles
{

    public static function dumpJobTitles()
    {

        $process = new Process(["python3", base_path() . "/app/Python/jobTitleSql_to_csv.py"]);
        $process->run();
        return $process->getOutput();


    }

}

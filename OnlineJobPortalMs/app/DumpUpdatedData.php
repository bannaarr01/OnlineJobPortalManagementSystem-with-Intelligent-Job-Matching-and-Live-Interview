<?php

namespace App;

use Auth;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class DumpUpdatedData
{

    public static function getUpdatedData()
    {

        $process = new Process(["python3", base_path() . "/app/Python/updatedDataSql_to_csv.py"]);
        $process->run();

        return $process->getOutput();


    }

}

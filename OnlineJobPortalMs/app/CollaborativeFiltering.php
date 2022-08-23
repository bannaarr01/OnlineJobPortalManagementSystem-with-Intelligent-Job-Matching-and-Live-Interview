<?php

namespace App;

use Auth;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use App\Http\Controllers\JobController;

class CollaborativeFiltering{

    public static function getRecommendations(){
        //$user_id = Auth::user()->id;
        $user_id = Auth::user();
        
        $argTitle = config('argTitle');//gettin d global var(jobTitle)
       
        // $process = new Process(["python3", base_path() ."/app/Python/SimpleUserCF.py", "$user_id"]);

    //    $process = new Process(["python3", base_path() ."/app/Python/app.py","$user_id"]);
    $process = new Process(["python3", base_path() ."/app/Python/contentBasedRec.py", "$argTitle"]);

        $process->run();
        //Comment ds Later
        if (!$process->isSuccessful()) {
             throw new ProcessFailedException($process);
         }
        //$outPutJobsRecommended = json_decode($process->getOutput(), true);
        //return $process->getOutput();
       //return $outPutJobsRecommended;
         return $process->getOutput();

    //$data = [];
            //array_push($data, $process->getOutput());
           // return $data;
          //return(json_encode($process->getOutput(), true));
    }

}
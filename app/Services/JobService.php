<?php

namespace App\Services;

interface JobService 
{
    public function getAllJobs();

    public function getJobById(int $id);
  
}


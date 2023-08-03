<?php

namespace App\Repositories;

interface JobRepository 
{
    public function getAllJobs();

    public function getJobById(int $id);
  
}
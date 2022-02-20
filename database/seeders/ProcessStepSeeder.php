<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProcessStep;

class ProcessStepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $processSteps = [];
        
        ProcessStep::insert($processSteps);
    }    
}

<?php

namespace App\Console\Commands;

use App\Models\Problem;
use Illuminate\Console\Command;

class CheckDueTimes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $problems = Problem::whereBetween('due_time', [now(), now()->addHour()])->get();
        if ($problems) {
       
        }
        return Command::SUCCESS;
    }
}

<?php

namespace App\Console\Commands;

use App\Helpers\Factorial;
use Illuminate\Console\Command;

class ExerciseFactorial extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'exercise:factorial {--number=10 : Number to calculate factorial} {--detailed : Show detailed result}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Execute the exercise 3 and show results';

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
    {
        $number = (int) $this->option('number');
        $detailed = $this->option('detailed');
        $log = [];

        $result = Factorial::getFactorial($number, $log);

        if ($detailed) {
            return $this->info(implode("\n", $log));
        }

        $this->info("!{$number} = {$result}");
    }
}

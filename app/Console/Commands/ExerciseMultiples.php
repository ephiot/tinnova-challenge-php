<?php

namespace App\Console\Commands;

use App\Helpers\Factorial;
use App\Helpers\Multiples;
use Illuminate\Console\Command;

class ExerciseMultiples extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'exercise:multiples {--number=10 : Number to calculate multiples of 3 and 5} {--multipliers=3,5 : Multipliers (comma-separated list)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Execute the exercise 4 and show results';

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
        $multipliers = explode(',', $this->option('multipliers'));

        $multiples = [];
        $sum = Multiples::sumMultiples($multiples, $number, ...$multipliers);

        $this->info("Multiples: " . implode(', ', $multiples));
        $this->info("Sum result: {$sum}");
    }
}

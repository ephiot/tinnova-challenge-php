<?php

namespace App\Console\Commands;

use App\Helpers\BubbleSort;
use Illuminate\Console\Command;

class ExerciseBubbleSort extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'exercise:bubble-sort {--list=5,3,2,4,7,1,0,6 : Raw list (comma separated list} {--step-by-step : Output step-by-step execution}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Execute the exercise 2 and show results';

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
        $stepByStep = $this->option('step-by-step');
        $list = explode(',', $this->option('list'));
        $log = [];

        $this->info('Original: ' . implode(', ', $list));

        $sorted = BubbleSort::sort($list, 0, $log);
        $this->info('Sorted: ' . implode(', ', $sorted));

        if (!$stepByStep) {
            return;
        }

        foreach ($log as $index => $iteration) {
            $this->info('Iteration [' . $index + 1 . ']: ' . implode(', ', $iteration));
        }
    }
}

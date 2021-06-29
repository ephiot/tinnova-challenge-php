<?php

namespace App\Console\Commands;

use App\Services\ElectionCalculator;
use Illuminate\Console\Command;

class ExerciseElection extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'exercise:election   {--total-voters=1000 : Total voters} \
                                                {--valid-votes=800 : Valid votes} \
                                                {--blank-votes=150 : Blank votes} \
                                                {--null-votes=50 : Null Votes}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Execute the exercise 1 and show results';

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
        $totalVoters = $this->option('total-voters');
        $validVotes = $this->option('valid-votes');
        $blankVotes = $this->option('blank-votes');
        $nullVotes = $this->option('null-votes');

        $this->info('Exercise 1');
        $this->table(
            ['Total Voters', 'Valid Votes', 'Blank Votes', 'Null Votes'],
            [
                [$totalVoters, $validVotes, $blankVotes, $nullVotes]
            ]
        );

        $service = new ElectionCalculator();
        $validVotesRelation = $service->getValidVotesPercentage($totalVoters, $validVotes);
        $blankVotesRelation = $service->getBlankVotesPercentage($totalVoters, $blankVotes);
        $nullVotesRelation = $service->getNullVotesPercentage($totalVoters, $nullVotes);

        $this->table(
            ['Valid Votes X Total Voters', 'Blank Votes X Total Voters', 'Null Votes X Total Voters'],
            [
                ["{$validVotesRelation}%", "{$blankVotesRelation}%", "{$nullVotesRelation}%"]
            ]
        );
    }
}

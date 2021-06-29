<?php

namespace App\Contracts;

interface ElectionCalculator
{
    /**
     * Get valid votes percentage (valid votes / total voters)
     * 
     * @param  int  $voters  Total voters
     * @param  int  $votes  Valid votes
     * @return float
     */
    public function getValidVotesPercentage(int $voters, int $votes) : float;

    /**
     * Get blank votes percentage (valid votes / total voters)
     * 
     * @param  int  $voters  Total voters
     * @param  int  $votes  Valid votes
     * @return float
     */
    public function getBlankVotesPercentage(int $voters, int $votes) : float;

    /**
     * Get null votes percentage (valid votes / total voters)
     * 
     * @param  int  $voters  Total voters
     * @param  int  $votes  Valid votes
     * @return float
     */
    public function getNullVotesPercentage(int $voters, int $votes) : float;
}

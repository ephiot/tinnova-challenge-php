<?php

namespace App\Services;

use App\Contracts\ElectionCalculator as ElectionCalculatorInterface;
use App\Exceptions\NegativeValueException;
use App\Traits\GetRelation;
use App\Traits\IsNegative;

class ElectionCalculator implements ElectionCalculatorInterface
{
    use GetRelation, IsNegative;

    /**
     * Get valid votes percentage (valid votes / total voters)
     * 
     * @param  int  $voters  Total voters
     * @param  int  $votes  Valid votes
     * @return float
     */
    public function getValidVotesPercentage(int $voters, int $votes) : float
    {
        if ($this->isNegative($voters, $votes)) {
            throw new NegativeValueException();
        }
        return $this->getRelation($votes, $voters) * 100;
    }

    /**
     * Get blank votes percentage (valid votes / total voters)
     * 
     * @param  int  $voters  Total voters
     * @param  int  $votes  Valid votes
     * @return float
     */
    public function getBlankVotesPercentage(int $voters, int $votes) : float
    {
        if ($this->isNegative($voters, $votes)) {
            throw new NegativeValueException();
        }
        return $this->getRelation($votes, $voters) * 100;
    }

    /**
     * Get null votes percentage (valid votes / total voters)
     * 
     * @param  int  $voters  Total voters
     * @param  int  $votes  Valid votes
     * @return float
     */
    public function getNullVotesPercentage(int $voters, int $votes) : float
    {
        if ($this->isNegative($voters, $votes)) {
            throw new NegativeValueException();
        }
        return $this->getRelation($votes, $voters) * 100;
    }
}

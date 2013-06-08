<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-08 
 */

namespace Net\Bazzline\Component\TestCase\Answer;

/**
 * Class FreeTextAnswer
 *
 * @package Net\Bazzline\Component\TestCase\Answer
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-07
 */
class FreeTextAnswer extends AnswerAbstract
{
    /**
     * @{inheritDoc}
     */
    public function getPercentageOfAccuracy()
    {
        $numberOfValidOpportunities = count($this->validOpportunities);
        $numberOfCountedValidOpportunities = 0;

        $freeText = strtolower(end($this->selectedOpportunities));

        foreach ($this->validOpportunities as $needle) {
            if (stripos($freeText, $needle) !== false) {
                $numberOfCountedValidOpportunities++;
            }
        }

        $accuracy = $numberOfCountedValidOpportunities / $numberOfValidOpportunities;
        $percentage = $accuracy * 100;

        return (integer) $percentage;
    }
}
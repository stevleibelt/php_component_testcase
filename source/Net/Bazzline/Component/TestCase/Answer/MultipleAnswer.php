<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-08 
 */

namespace Net\Bazzline\Component\TestCase\Answer;

/**
 * Class MultipleAnswer
 *
 * @package Net\Bazzline\Component\TestCase\Answer
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-07
 */
class MultipleAnswer extends AnswerAbstract
{
    /**
     * @{inheritdoc}
     */
    public function getPercentageOfAccuracy()
    {
        $numberOfValidOpportunities = count($this->validOpportunities);
        $numberOfValidSelectedOpportunities = 0;

        foreach ($this->enteredOpportunities as $selectedOpportunity) {
            if (isset($this->validOpportunities[md5($selectedOpportunity)])) {
                $numberOfValidSelectedOpportunities++;
            }
        }

        if ($numberOfValidSelectedOpportunities > 0) {
            $accuracy = $numberOfValidSelectedOpportunities / $numberOfValidOpportunities;
            $percentage = $accuracy * 100;
        } else {
            $percentage = 0;
        }

        return (integer) $percentage;
    }
}
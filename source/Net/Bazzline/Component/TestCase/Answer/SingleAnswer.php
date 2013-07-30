<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-08 
 */

namespace Net\Bazzline\Component\TestCase\Answer;

/**
 * Class SingleAnswer
 *
 * @package Net\Bazzline\Component\TestCase\Answer
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-07
 */
class SingleAnswer extends AnswerAbstract
{
    /**
     * @{inheritdoc}
     */
    public function getPercentageOfAccuracy()
    {
        $percentage = ((count($this->enteredOpportunities) == 1)
            && (in_array(end($this->enteredOpportunities), $this->validOpportunities))) ?
            100 : 0;

        return $percentage;
    }
}
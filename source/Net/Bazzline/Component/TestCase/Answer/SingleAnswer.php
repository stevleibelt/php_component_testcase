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
     * @{inheritDoc}
     */
    public function validateSelectedOpportunities()
    {
        $isValid = ((count($this->selectedOpportunities) == 1)
            && (in_array(end($this->selectedOpportunities), $this->validOpportunities)));

        return $isValid;
    }

    /**
     * @{inheritDoc}
     */
    public function getPercentageOfAccuracy()
    {
        return ($this->validateSelectedOpportunities()) ? 100 : 0;
    }
}
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
     * @{inheritDoc}
     */
    public function validateSelectedOpportunities()
    {
        $arrayDiff = array_diff_assoc($this->selectedOpportunities, $this->validOpportunities);

        $isValid = empty($arrayDiff);

        return $isValid;
    }

    /**
     * @{inheritDoc}
     */
    public function getPercentageOfAccuracy()
    {
        $numberOfValidOpportunities = count($this->validOpportunities);
        $numberOfValidSelectedOpportunities = 0;

        foreach ($this->selectedOpportunities as $selectedOpportunity) {
            if (isset($this->validOpportunities[md5($selectedOpportunity)])) {
                $numberOfValidSelectedOpportunities++;
            }
        }

        $accuracy = $numberOfValidOpportunities / $numberOfValidSelectedOpportunities;
        $percentage = number_format($accuracy, 2);

        return $percentage;
    }
}
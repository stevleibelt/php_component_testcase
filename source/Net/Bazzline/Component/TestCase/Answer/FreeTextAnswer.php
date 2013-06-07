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
    public function validateSelectedOpportunities()
    {
        $isValid = false;

        if (count($this->selectedOpportunities) == 1) {
            $isValid = true;
            $freeText = strtolower(end($this->selectedOpportunities));

            foreach ($this->validOpportunities as $needle) {
                if (stripos($freeText, $needle) === false) {
                    $isValid = false;

                    break;
                }
            }
        }

        return $isValid;
    }

    /**
     * @{inheritDoc}
     */
    public function getPercentageOfAccuracy()
    {
        $freeText = strtolower(end($this->selectedOpportunities));
        $numberOfValidOpportunities = count($this->validOpportunities);
        $numberOfValidOpportunitiesInFreeText = 0;

        foreach ($this->validOpportunities as $needle) {
            if (stripos($freeText, $needle) !== false) {
                $numberOfValidOpportunitiesInFreeText++;
            }
        }

        $accuracy = $numberOfValidOpportunities / $numberOfValidOpportunitiesInFreeText;
        $percentage = number_format($accuracy, 2);

        return $percentage;
    }}
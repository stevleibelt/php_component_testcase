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
/*
# frage
        "Beschreiben sie den weg eines webseiten aufrufes"

# antwort
"die url wird von einem dns server zu einer ip addresse uebersetzt. der server der ip addresse nimmt den request entgegen und liefert einen entsprechenden response zurueck."

# keywords
url
ip addresse
server
dns
request
response
*/
//----
        $freeText = strtolower(end($this->selectedOpportunities));
        $numberOfValidOpportunities = count($this->validOpportunities);
        $numberOfValidOpportunitiesInFreeText = 0;
        $numberOfSelectedOpportunities = count($this->selectedOpportunities);

        foreach ($this->validOpportunities as $needles) {
            $arrayOfNeedles = explode(' ', $needles);
            foreach ($arrayOfNeedles as $needle) {
                if (stripos($freeText, $needle) !== false) {
                    $numberOfValidOpportunitiesInFreeText++;
                }
            }
        }

        if ($numberOfValidOpportunitiesInFreeText > 0) {
            $accuracy = $numberOfValidOpportunitiesInFreeText / $numberOfValidOpportunities;
            $percentage = $accuracy * 100;
echo var_export(
    array(
        'this' => $this,
        'nr_free' => $numberOfValidOpportunitiesInFreeText,
        'nr_valid' => $numberOfValidOpportunities,
        'accuracy' => $accuracy,
        'percentage' => $percentage
    ), true) . PHP_EOL;
            if ($numberOfSelectedOpportunities > 1) {
                $percentage /= $numberOfSelectedOpportunities;
            }
        } else {
            $percentage = 0;
        }

        return $percentage;
    }}
<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-08 
 */

namespace Test\Net\Bazzline\Component\TestCase\Answer;

use Net\Bazzline\Component\TestCase\Answer\FreeTextAnswer;
use Test\Net\Bazzline\Component\TestCase\UnitTestCase;

/**
 * Class FreeTextAnswerTest
 *
 * @package Test\Net\Bazzline\Component\TestCase\Answer
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-08
 */
class FreeTextAnswerTest extends UnitTestCase
{
    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-08
     */
    public function testGetType()
    {
        $answer = $this->getNewFreeAnswer();

        $this->assertEquals('FreeTextAnswer', $answer->getType());
    }

    /**
     * @return array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-08
     */
    public static function providerForValidateSelectedOpportunitiesTest()
    {
        $defaultOpportunities = array(
            'opportunity one',
            'opportunity two',
            'opportunity three',
            'opportunity four'
        );
        $defaultSelectedOpportunities = array();
        $defaultValidOpportunities = array(
            'opportunity two'
        );

        //NTC = negative test case
        //PTC = positive test case
        $testCases = array(
            'NTC - No opportunity entered' => array(
                'opportunities' => array(),
                'selectedOpportunities' => array(),
                'validOpportunities' => array(),
                'isValid' => false,
                'percentageOfAccuracy' => 0
            ),
            'NTC - Two invalid opportunities entered' => array(
                'opportunities' => array(),
                'selectedOpportunities' => array(
                    'opportunity one',
                    'opportunity four'
                ),
                'validOpportunities' => array(),
                'isValid' => false,
                'percentageOfAccuracy' => 0
            ),
            'NTC - One invalid opportunity entered' => array(
                'opportunities' => array(),
                'selectedOpportunities' => array(
                    'opportunity one'
                ),
                'validOpportunities' => array(),
                'isValid' => false,
                'percentageOfAccuracy' => 0
            ),
            'NTC - One valid and one invalid opportunity entered' => array(
                'opportunities' => array(),
                'selectedOpportunities' => array(
                    'opportunity one',
                    'opportunity two'
                ),
                'validOpportunities' => array(),
                'isValid' => false,
                'percentageOfAccuracy' => 50
            ),
            'PTC - One full valid opportunity entered' => array(
                'opportunities' => array(),
                'selectedOpportunities' => array(
                    'opportunity two'
                ),
                'validOpportunities' => array(),
                'isValid' => true,
                'percentageOfAccuracy' => 100
            ),
            'PTC - One partial valid opportunity entered' => array(
                'opportunities' => array(),
                'selectedOpportunities' => array(
                    'this is a text with a two inside'
                ),
                'validOpportunities' => array(),
                'isValid' => true,
                'percentageOfAccuracy' => 50
            )
        );

        foreach ($testCases as &$testCase) {
            $testCase['opportunities'] = array_merge($testCase['opportunities'], $defaultOpportunities);
            $testCase['selectedOpportunities'] = array_merge($testCase['selectedOpportunities'], $defaultSelectedOpportunities);
            $testCase['validOpportunities'] = array_merge($testCase['validOpportunities'], $defaultValidOpportunities);
        }

        return $testCases;
    }

    /**
     * @dataProvider providerForValidateSelectedOpportunitiesTest
     * @param array $opportunities
     * @param array $selectedOpportunities
     * @param array $validOpportunities
     * @param bool $isValid
     * @param int $percentageOfAccuracy
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-08
     */
    public function testValidateSelectedOpportunities(array $opportunities, array $selectedOpportunities, array $validOpportunities, $isValid, $percentageOfAccuracy)
    {
        $answer = $this->getNewFreeAnswer();

        foreach ($opportunities as $opportunity) {
            $answer->addOpportunity($opportunity);
        }

        foreach ($selectedOpportunities as $selectedOpportunity) {
            $answer->addSelectedOpportunity($selectedOpportunity);
        }

        foreach ($validOpportunities as $validOpportunity) {
            $answer->addValidOpportunity($validOpportunity);
        }

        $this->assertEquals($isValid, $answer->validateSelectedOpportunities());
    }

    /**
     * @dataProvider providerForValidateSelectedOpportunitiesTest
     * @param array $opportunities
     * @param array $selectedOpportunities
     * @param array $validOpportunities
     * @param bool $isValid
     * @param int $percentageOfAccuracy
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-08
     */
    public function testGetPercentageOfAccuracy(array $opportunities, array $selectedOpportunities, array $validOpportunities, $isValid, $percentageOfAccuracy)
    {
        $answer = $this->getNewFreeAnswer();

        foreach ($opportunities as $opportunity) {
            $answer->addOpportunity($opportunity);
        }

        foreach ($selectedOpportunities as $selectedOpportunity) {
            $answer->addSelectedOpportunity($selectedOpportunity);
        }

        foreach ($validOpportunities as $validOpportunity) {
            $answer->addValidOpportunity($validOpportunity);
        }

        $this->assertEquals($percentageOfAccuracy, $answer->getPercentageOfAccuracy());
    }
    /**
     * @return FreeTextAnswer
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-08
     */
    private function getNewFreeAnswer()
    {
        return new FreeTextAnswer();
    }
}
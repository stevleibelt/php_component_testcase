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
        $defaultOpportunities = array();
        $defaultSelectedOpportunities = array();
        $defaultValidOpportunities = array(
            'two',
            'unittest',
            'php'
        );

        //NTC = negative test case
        //PTC = positive test case
        $testCases = array(
            'NTC - No opportunity entered' => array(
                'opportunities' => array(),
                'enteredOpportunities' => array(),
                'validOpportunities' => array(),
                'isValid' => false,
                'percentageOfAccuracy' => 0
            ),
            'NTC - Two invalid opportunities entered' => array(
                'opportunities' => array(),
                'enteredOpportunities' => array(
                    'an other opportunity is javascript'
                ),
                'validOpportunities' => array(),
                'isValid' => false,
                'percentageOfAccuracy' => 0
            ),
            'NTC - One invalid opportunity entered' => array(
                'opportunities' => array(),
                'enteredOpportunities' => array(
                    'opportunity'
                ),
                'validOpportunities' => array(),
                'isValid' => false,
                'percentageOfAccuracy' => 0
            ),
            'NTC - One valid and one invalid opportunity entered' => array(
                'opportunities' => array(),
                'enteredOpportunities' => array(
                    'opportunity two'
                ),
                'validOpportunities' => array(),
                'isValid' => false,
                'percentageOfAccuracy' => 33
            ),
            'NTC - One partial valid opportunity entered' => array(
                'opportunities' => array(),
                'enteredOpportunities' => array(
                    'this is a text with a two inside'
                ),
                'validOpportunities' => array(),
                'isValid' => false,
                'percentageOfAccuracy' => 66
            ),
            'NTC - One partial valid opportunity entered' => array(
                'opportunities' => array(),
                'enteredOpportunities' => array(
                    'this is a text with a two inside'
                ),
                'validOpportunities' => array(),
                'isValid' => false,
                'percentageOfAccuracy' => 33
            ),
            'PTC - One full valid opportunity entered' => array(
                'opportunities' => array(),
                'enteredOpportunities' => array(
                    'php has more then two ways of unittests'
                ),
                'validOpportunities' => array(),
                'isValid' => true,
                'percentageOfAccuracy' => 100
            )
        );

        foreach ($testCases as &$testCase) {
            $testCase['opportunities'] = array_merge($testCase['opportunities'], $defaultOpportunities);
            $testCase['enteredOpportunities'] = array_merge($testCase['enteredOpportunities'], $defaultSelectedOpportunities);
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
            $answer->addEnteredOpportunity($selectedOpportunity);
        }

        foreach ($validOpportunities as $validOpportunity) {
            $answer->addValidOpportunity($validOpportunity);
        }

        $this->assertEquals($isValid, $answer->validateEnteredOpportunities());
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
            $answer->addEnteredOpportunity($selectedOpportunity);
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
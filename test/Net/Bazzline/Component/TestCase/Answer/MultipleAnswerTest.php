<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-08 
 */

namespace Test\Net\Bazzline\Component\TestCase\Answer;

use Net\Bazzline\Component\TestCase\Answer\MultipleAnswer;
use Test\Net\Bazzline\Component\TestCase\UnitTestCase;

/**
 * Class MultipleAnswerTest
 *
 * @package Test\Net\Bazzline\Component\TestCase\Answer
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-08
 */
class MultipleAnswerTest extends UnitTestCase
{
    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-08
     */
    public function testGetType()
    {
        $answer = $this->getNewMultipleAnswer();

        $this->assertEquals('MultipleAnswer', $answer->getType());
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
            'opportunity two',
            'opportunity three'
        );

        //NTC = negative test case
        //PTC = positive test case
        $testCases = array(
            'NTC - No opportunity selected' => array(
                'opportunities' => array(),
                'enteredOpportunities' => array(),
                'validOpportunities' => array(),
                'percentageOfAccuracy' => 0
            ),
            'NTC - Two invalid opportunities selected' => array(
                'opportunities' => array(),
                'enteredOpportunities' => array(
                    'opportunity one',
                    'opportunity four'
                ),
                'validOpportunities' => array(),
                'percentageOfAccuracy' => 0
            ),
            'NTC - One invalid opportunity selected' => array(
                'opportunities' => array(),
                'enteredOpportunities' => array(
                    'opportunity one'
                ),
                'validOpportunities' => array(),
                'percentageOfAccuracy' => 0
            ),
            'NTC - One valid opportunity selected' => array(
                'opportunities' => array(),
                'enteredOpportunities' => array(
                    'opportunity two'
                ),
                'validOpportunities' => array(),
                'percentageOfAccuracy' => 50
            ),
            'NTC - One valid and one invalid opportunity selected' => array(
                'opportunities' => array(),
                'enteredOpportunities' => array(
                    'opportunity one',
                    'opportunity two'
                ),
                'validOpportunities' => array(),
                'percentageOfAccuracy' => 50
            ),
            'PTC - Two valid opportunity selected' => array(
                'opportunities' => array(),
                'enteredOpportunities' => array(
                    'opportunity two',
                    'opportunity three'
                ),
                'validOpportunities' => array(),
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
     * @param int $percentageOfAccuracy
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-08
     */
    public function testValidateSelectedOpportunities(array $opportunities, array $selectedOpportunities, array $validOpportunities, $percentageOfAccuracy)
    {
        $answer = $this->getNewMultipleAnswer();

        foreach ($opportunities as $opportunity) {
            $answer->addOpportunity($opportunity);
        }

        foreach ($selectedOpportunities as $selectedOpportunity) {
            $answer->addEnteredOpportunity($selectedOpportunity);
        }

        foreach ($validOpportunities as $validOpportunity) {
            $answer->addValidOpportunity($validOpportunity);
        }

        $isValid = ($percentageOfAccuracy == 100);

        $this->assertEquals($isValid, $answer->validateEnteredOpportunities());
    }

    /**
     * @dataProvider providerForValidateSelectedOpportunitiesTest
     * @param array $opportunities
     * @param array $selectedOpportunities
     * @param array $validOpportunities
     * @param int $percentageOfAccuracy
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-08
     */
    public function testGetPercentageOfAccuracy(array $opportunities, array $selectedOpportunities, array $validOpportunities, $percentageOfAccuracy)
    {
        $answer = $this->getNewMultipleAnswer();

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
     * @return MultipleAnswer
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-08
     */
    private function getNewMultipleAnswer()
    {
        return new MultipleAnswer();
    }
}
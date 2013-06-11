<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-08 
 */

namespace Test\Net\Bazzline\Component\TestCase\Answer;

use Net\Bazzline\Component\TestCase\Answer\SingleAnswer;
use Test\Net\Bazzline\Component\TestCase\UnitTestCase;

/**
 * Class SingleAnswerTest
 *
 * @package Test\Net\Bazzline\Component\TestCase\Answer
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-08
 */
class SingleAnswerTest extends UnitTestCase
{
    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-08
     */
    public function testGetType()
    {
        $answer = $this->getNewSingleAnswer();

        $this->assertEquals('SingleAnswer', $answer->getType());
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
            'opportunity three'
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
                'enteredOpportunities' => array(),
                'validOpportunities' => array(),
                'isValid' => false
            ),
            'NTC - Two opportunities entered' => array(
                'opportunities' => array(),
                'enteredOpportunities' => array(
                    'opportunity one',
                    'opportunity two'
                ),
                'validOpportunities' => array(),
                'isValid' => false
            ),
            'NTC - One invalid opportunity entered' => array(
                'opportunities' => array(),
                'enteredOpportunities' => array(
                    'opportunity one'
                ),
                'validOpportunities' => array(),
                'isValid' => false
            ),
            'PTC - One valid opportunity entered' => array(
                'opportunities' => array(),
                'enteredOpportunities' => array(
                    'opportunity two'
                ),
                'validOpportunities' => array(),
                'isValid' => true
            )
        );

        foreach ($testCases as &$testCase) {
            $testCase['opportunities'] = array_merge($defaultOpportunities, $testCase['opportunities']);
            $testCase['enteredOpportunities'] = array_merge($defaultSelectedOpportunities, $testCase['enteredOpportunities']);
            $testCase['validOpportunities'] = array_merge($defaultValidOpportunities, $testCase['validOpportunities']);
        }

        return $testCases;
    }

    /**
     * @dataProvider providerForValidateSelectedOpportunitiesTest
     * @param array $opportunities
     * @param array $enteredOpportunities
     * @param array $validOpportunities
     * @param bool $isValid
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-08
     */
    public function testValidateSelectedOpportunities(array $opportunities, array $enteredOpportunities, array $validOpportunities, $isValid)
    {
        $answer = $this->getNewSingleAnswer();

        foreach ($opportunities as $opportunity) {
            $answer->addOpportunity($opportunity);
        }

        foreach ($enteredOpportunities as $enteredOpportunity) {
            $answer->addEnteredOpportunity($enteredOpportunity);
        }

        foreach ($validOpportunities as $validOpportunity) {
            $answer->addValidOpportunity($validOpportunity);
        }

        $this->assertEquals($isValid, $answer->validateEnteredOpportunities());
    }

    /**
     * @dataProvider providerForValidateSelectedOpportunitiesTest
     * @param array $opportunities
     * @param array $enteredOpportunities
     * @param array $validOpportunities
     * @param bool $isValid
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-08
     */
    public function testGetPercentageOfAccuracy(array $opportunities, array $enteredOpportunities, array $validOpportunities, $isValid)
    {
        $answer = $this->getNewSingleAnswer();

        foreach ($opportunities as $opportunity) {
            $answer->addOpportunity($opportunity);
        }

        foreach ($enteredOpportunities as $enteredOpportunity) {
            $answer->addEnteredOpportunity($enteredOpportunity);
        }

        foreach ($validOpportunities as $validOpportunity) {
            $answer->addValidOpportunity($validOpportunity);
        }

        $percentage = ($isValid) ? 100 : 0;

        $this->assertEquals($percentage, $answer->getPercentageOfAccuracy());
    }

    /**
     * @return SingleAnswer
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-08
     */
    private function getNewSingleAnswer()
    {
        return new SingleAnswer();
    }
}
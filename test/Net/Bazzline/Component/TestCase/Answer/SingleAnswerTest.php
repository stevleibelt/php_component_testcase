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
            'NTC - No opportunity selected' => array(
                'opportunities' => array(),
                'selectedOpportunities' => array(),
                'validOpportunities' => array(),
                'isValid' => false
            ),
            'NTC - Two opportunities selected' => array(
                'opportunities' => array(),
                'selectedOpportunities' => array(
                    'opportunity one',
                    'opportunity two'
                ),
                'validOpportunities' => array(),
                'isValid' => false
            ),
            'NTC - One invalid opportunity selected' => array(
                'opportunities' => array(),
                'selectedOpportunities' => array(
                    'opportunity one'
                ),
                'validOpportunities' => array(),
                'isValid' => false
            ),
            'PTC - One valid opportunity selected' => array(
                'opportunities' => array(),
                'selectedOpportunities' => array(
                    'opportunity two'
                ),
                'validOpportunities' => array(),
                'isValid' => true
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
     * @param $isValid
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-08
     */
    public function testValidateSelectedOpportunities(array $opportunities, array $selectedOpportunities, array $validOpportunities, $isValid)
    {
        $answer = $this->getNewSingleAnswer();

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
     * @param $isValid
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-08
     */
    public function testGetPercentageOfAccuracy(array $opportunities, array $selectedOpportunities, array $validOpportunities, $isValid)
    {
        $answer = $this->getNewSingleAnswer();

        foreach ($opportunities as $opportunity) {
            $answer->addOpportunity($opportunity);
        }

        foreach ($selectedOpportunities as $selectedOpportunity) {
            $answer->addSelectedOpportunity($selectedOpportunity);
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
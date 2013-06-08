<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-08 
 */

namespace Test\Net\Bazzline\Component\TestCase\Answer;

use Mockery;
use Test\Net\Bazzline\Component\TestCase\UnitTestCase;

/**
 * Class AnswerAbstractTest
 *
 * @package Test\Net\Bazzline\Component\TestCase\Answer
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-08
 */
class AnswerAbstractTest extends UnitTestCase
{
    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-08
     */
    public function testConstruct()
    {
        $answer = $this->getNewAnswerAbstractMock();

        $this->assertEquals(array(), $answer->getOpportunities());
        $this->assertEquals(array(), $answer->getEnteredOpportunities());
        $this->assertEquals(array(), $answer->getValidOpportunities());
    }

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-08
     */
    public function testGetAndAddOpportunities()
    {
        $answer = $this->getNewAnswerAbstractMock();

        $opportunities = array(
            'opportunity one',
            'opportunity two'
        );

        foreach ($opportunities as $opportunity) {
            $answer->addOpportunity($opportunity);
        }

        $this->assertEquals($opportunities, array_values($answer->getOpportunities()));
    }

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-08
     */
    public function testGetAndAddSelectedOpportunities()
    {
        $answer = $this->getNewAnswerAbstractMock();

        $selectedOpportunities = array(
            'selected opportunity one',
            'selected opportunity two'
        );

        foreach ($selectedOpportunities as $selectedOpportunity) {
            $answer->addEnteredOpportunity($selectedOpportunity);
        }

        $this->assertEquals($selectedOpportunities, array_values($answer->getEnteredOpportunities()));
    }

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-08
     */
    public function testGetAndAddValidOpportunities()
    {
        $answer = $this->getNewAnswerAbstractMock();

        $validOpportunities = array(
            'valid opportunity one',
            'valid opportunity two'
        );

        foreach ($validOpportunities as $validOpportunity) {
            $answer->addValidOpportunity($validOpportunity);
        }

        $this->assertEquals($validOpportunities, array_values($answer->getValidOpportunities()));
    }

    /**
     * @return \Mockery\MockInterface|\Net\Bazzline\Component\TestCase\Answer\AnswerAbstract'
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-08
     */
    private function getNewAnswerAbstractMock()
    {
        return Mockery::mock('Net\Bazzline\Component\TestCase\Answer\AnswerAbstract[getPercentageOfAccuracy]');
    }
}
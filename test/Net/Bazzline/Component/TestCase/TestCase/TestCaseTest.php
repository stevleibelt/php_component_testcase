<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-08 
 */

namespace Test\Net\Bazzline\Component\TestCase\TestCase;

use Net\Bazzline\Component\TestCase\TestCase\TestCase;
use Test\Net\Bazzline\Component\TestCase\UnitTestCase;
use Test\Net\Bazzline\Component\TestCase\MockFactory;

class TestCaseTest extends UnitTestCase
{
    /**
     * @expectedException \Net\Bazzline\Component\TestCase\TestCase\RuntimeException
     * @expectedExceptionMessage Answer not set.
     *
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-08
     */
    public function testGetAnswerWithNoAnswerSet()
    {
        $testCase = $this->getNewTestCase();
        $testCase->getAnswer();
    }

    /**
     * @expectedException \Net\Bazzline\Component\TestCase\TestCase\RuntimeException
     * @expectedExceptionMessage Question not set.
     *
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-08
     */
    public function testGetQuestionWithNoQuestionSet()
    {
        $testCase = $this->getNewTestCase();
        $testCase->getQuestion();
    }

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-08
     */
    public function testSetAndGetAnswer()
    {
        $testCase = $this->getNewTestCase();
        $answer = MockFactory::getSingleAnswer();

        $testCase->setAnswer($answer);

        $this->assertEquals(
            $answer,
            $testCase->getAnswer()
        );
    }

    /*
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-08
     */
    public function testSetAndGetQuestion()
    {
        $testCase = $this->getNewTestCase();
        $question = MockFactory::getQuestion();

        $testCase->setQuestion($question);

        $this->assertEquals(
            $question,
            $testCase->getQuestion()
        );
    }

    /**
     * @return TestCase
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-08
     */
    private function getNewTestCase()
    {
        return new TestCase();
    }
}
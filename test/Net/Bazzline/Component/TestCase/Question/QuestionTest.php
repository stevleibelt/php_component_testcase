<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-08 
 */

namespace Test\Net\Bazzline\Component\TestCase\Question;

use Net\Bazzline\Component\TestCase\Question\Question;
use Test\Net\Bazzline\Component\TestCase\UnitTestCase;

/**
 * Class QuestionTest
 *
 * @package Test\Net\Bazzline\Component\TestCase\Question
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-08
 */
class QuestionTest extends UnitTestCase
{
    /**
     * Provider for invalid arguments
     *
     * @return array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-08
     */
    public static function providerInvalidArgument()
    {
        return array(
            array(null),
            array('')
        );
    }

    /**
     * @dataProvider providerInvalidArgument
     * @expectedException \Net\Bazzline\Component\TestCase\Question\InvalidArgumentException
     * @expectedExceptionMessage Problem definition must have at least one character.
     *
     * @author stev leibelt <artodeto@arcor.de>
     * @since
     */
    public function testSetProblemDefinitionWithInvalidArguments($invalidArgument)
    {
        $question = $this->getNewQuestion();

        $question->setProblemDefinition($invalidArgument);
    }

    /**
     * @dataProvider providerInvalidArgument
     * @expectedException \Net\Bazzline\Component\TestCase\Question\InvalidArgumentException
     * @expectedExceptionMessage Hint must have at least one character.
     *
     * @author stev leibelt <artodeto@arcor.de>
     * @since
     */
    public function testSetHintWithInvalidArguments($invalidArgument)
    {
        $question = $this->getNewQuestion();

        $question->setHint($invalidArgument);
    }

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-08
     */
    public function testSetAndGetProblemDefinition()
    {
        $question = $this->getNewQuestion();
        $problemDefinition = 'test problem definition';

        $this->assertNull($question->getProblemDefinition());

        $question->setProblemDefinition($problemDefinition);

        $this->assertEquals($problemDefinition, $question->getProblemDefinition());
    }

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-08
     */
    public function testHasSetAndGetHint()
    {
        $question = $this->getNewQuestion();
        $hint = 'test hint';

        $this->assertNull($question->getHint());
        $this->assertFalse($question->hasHint());

        $question->setHint($hint);

        $this->assertEquals($hint, $question->getHint());
        $this->assertTrue($question->hasHint());
    }

    /**
     * @return Question
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-08
     */
    private function getNewQuestion()
    {
        return new Question();
    }
}
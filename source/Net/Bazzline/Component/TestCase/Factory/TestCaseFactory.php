<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-08 
 */

namespace Net\Bazzline\Component\TestCase\Factory;

use Net\Bazzline\Component\TestCase\TestCase\TestCase;

/**
 * Class TestCaseFactory
 *
 * @package Net\Bazzline\Component\TestCase\Factory
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-08
 */
class TestCaseFactory extends FactoryAbstract
{
    /**
     * Creates factory
     *
     * @return FromSourceFactoryInterface|TestCaseFactory
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-08
     */
    public static function create()
    {
        return new self();
    }

    /**
     * Creates test case from source
     *
     * @param string $source - relative path to source
     * @return TestCase
     * @throws InvalidArgumentException
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-08
     */
    public function fromSource($source)
    {
        $sourceAsArray = $this->getSourceAsPhpArray($source);

        if (!is_array($sourceAsArray)) {
            throw new InvalidArgumentException(
                'Source has to be from type array'
            );
        }

        if (!isset($sourceAsArray['question'])) {
            throw new InvalidArgumentException(
                'No question found in suite'
            );
        }

        if (!isset($sourceAsArray['answer'])) {
            throw new InvalidArgumentException(
                'No answer found in suite'
            );
        }

        $testCase = new TestCase();

        $answerFactory = AnswerFactory::create();
        $questionFactory = QuestionFactory::create();

        $question = $questionFactory->fromSource($sourceAsArray['question']);
        $answer = $answerFactory->fromSource($sourceAsArray['answer']);

        $testCase->setQuestion($question);
        $testCase->setAnswer($answer);

        return $testCase;
    }
}
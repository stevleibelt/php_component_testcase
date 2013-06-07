<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-08 
 */

namespace Net\Bazzline\Component\TestCase\Factory;

use Net\Bazzline\Component\TestCase\Question\Question;

/**
 * Class QuestionFactory
 *
 * @package Net\Bazzline\Component\TestCase\Factory
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-08
 */
class QuestionFactory extends FactoryAbstract
{
    /**
     * Creates factory
     *
     * @return FromSourceFactoryInterface|QuestionFactory
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-08
     */
    public static function create()
    {
        return new self();
    }

    /**
     * Creates question from source
     *
     * @param string $source - relative path to source
     * @return Question
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

        if (!isset($sourceAsArray['problemDefinition'])) {
            throw new InvalidArgumentException(
                'No problemDefinition found in source array'
            );
        }

        $question = new Question();

        $question->setProblemDefinition($sourceAsArray['problemDefinition']);
        if (isset($sourceAsArray['hint'])) {
            $question->setHint($sourceAsArray['hint']);
        }

        return $question;
    }
}
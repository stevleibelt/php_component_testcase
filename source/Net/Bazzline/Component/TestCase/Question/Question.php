<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-08 
 */

namespace Net\Bazzline\Component\TestCase\Question;

/**
 * Class Question
 *
 * @package Net\Bazzline\Component\TestCase\Question
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-08
 */
class Question implements QuestionInterface
{
    /**
     * @var string
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    private $hint;

    /**
     * @var string
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    private $problemDefinition;

    /**
     * @{inheritdoc}
     */
    public function getHint()
    {
        return $this->hint;
    }

    /**
     * @{inheritdoc}
     */
    public function getProblemDefinition()
    {
        return $this->problemDefinition;
    }

    /**
     * @{inheritdoc}
     */
    public function hasHint()
    {
        return (!is_null($this->hint));
    }

    /**
     * @{inheritdoc}
     */
    public function setHint($hint)
    {
        if (strlen((string) $hint) < 1) {
            throw new InvalidArgumentException(
                'Hint must have at least one character.'
            );
        }

        $this->hint = $hint;

        return $this;
    }

    /**
     * @{inheritdoc}
     */
    public function setProblemDefinition($problemDefinition)
    {
        if (strlen((string) $problemDefinition) < 1) {
            throw new InvalidArgumentException(
                'Problem definition must have at least one character.'
            );
        }

        $this->problemDefinition = $problemDefinition;

        return $this;
    }
}
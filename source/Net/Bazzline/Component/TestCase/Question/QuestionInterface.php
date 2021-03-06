<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-08 
 */

namespace Net\Bazzline\Component\TestCase\Question;

/**
 * Class QuestionInterface
 *
 * @package Net\Bazzline\Component\TestCase\Question
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-08
 */
interface QuestionInterface
{
    /**
     * Returns a hint to the solution
     *
     * @return string
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-25
     */
    public function getHint();

    /**
     * Returns the current problem
     *
     * @return mixed
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-25
     */
    public function getProblemDefinition();

    /**
     * Method to check if a hind is available
     *
     * @return boolean
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function hasHint();

    /**
     * Sets the hint to find the right answer.
     *
     * @param string $hint - the hint
     *
     * @return QuestionInterface
     * @throws InvalidArgumentException
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function setHint($hint);

    /**
     * Sets the question
     *
     * @param string $problemDefinition - the question
     *
     * @return QuestionInterface
     * @throws InvalidArgumentException
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function setProblemDefinition($problemDefinition);
}
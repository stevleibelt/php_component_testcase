<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-07 
 */

namespace Net\Bazzline\Component\TestCase\Answer;

/**
 * Class AnswerInterface
 *
 * @package Net\Bazzline\Component\TestCase\Answer
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-07
 */
interface AnswerInterface
{
    /**
     * Returns the available opportunities as array.
     *
     * @return array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-25
     */
    public function getOpportunities();

    /**
     *
     * @param string $selectedOpportunity - user selected opportunity
     *
     * @return AnswerInterface
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-25
     */
    public function addSelectedOpportunity($selectedOpportunity);

    /**
     * Returns an array of selected opportunities.
     *
     * @return array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-08
     */
    public function getSelectedOpportunities();

    /**
     * Validates given opportunity.
     *
     * @return boolean
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-25
     */
    public function validateSelectedOpportunities();

    /**
     * Returns the percentage (0 up to 100) of accuracy.
     *
     * @return integer
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-25
     */
    public function getPercentageOfAccuracy();

    /**
     * Returns an array of correct opportunities.
     *
     * @return array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-25
     */
    public function getValidOpportunities();

    /**
     * Returns type of answer
     *
     * @return string
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-25
     */
    public function getType();

    /**
     * Adds a opportunity
     *
     * @param string $opportunity - a opportunity
     *
     * @return AnswerInterface
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-25
     */
    public function addOpportunity($opportunity);

    /**
     * Adds a valid opportunity
     *
     * @param string $validOpportunity - a valid opportunity
     *
     * @return mixed
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-25
     */
    public function addValidOpportunity($validOpportunity);
}
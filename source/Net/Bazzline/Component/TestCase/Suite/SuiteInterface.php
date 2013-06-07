<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-08 
 */

namespace Net\Bazzline\Component\TestCase\Suite;

use Net\Bazzline\Component\TestCase\TestCase\TestCaseInterface;

/**
 * Class SuiteInterface
 *
 * @package Net\Bazzline\Component\TestCase\Suite
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-08
 */
interface SuiteInterface
{

    /**
     * Getter for name
     *
     * @return null|string
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function getName();

    /**
     * Setter for name
     *
     * @param string $name - name of the suite
     * @return SuiteInterface
     * @throws InvalidArgumentException
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function setName($name);

    /**
     * Getter for description
     *
     * @return null|string
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function getDescription();

    /**
     * Setter for description
     *
     * @param string $description - description of the suite
     *
     * @return SuiteInterface
     * @throws InvalidArgumentException
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function setDescription($description);

    /**
     * Getter for language
     *
     * @return null|string
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function getLanguage();

    /**
     * Setter for language
     *
     * @param string $language - language of suite
     *
     * @return SuiteInterface
     * @throws InvalidArgumentException
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function setLanguage($language);

    /**
     * Getter for test cases
     *
     * @return array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function getTestCases();

    /**
     * Adds a test case.
     *
     * @param TestCaseInterface $testCase - a test case
     *
     * @return SuiteInterface
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function addTestCase(TestCaseInterface $testCase);
}
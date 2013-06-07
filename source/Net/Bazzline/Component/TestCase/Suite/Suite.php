<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-08 
 */

namespace Net\Bazzline\Component\TestCase\Suite;

use Net\Bazzline\Component\TestCase\TestCase\TestCaseInterface;

/**
 * Class Suite
 *
 * @package Net\Bazzline\Component\TestCase\Suite
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-08
 */
class Suite implements SuiteInterface
{
    /**
     * @var string
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    private $description;

    /**
     * @var string
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    private $language;

    /**
     * @var string
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    private $name;

    /**
     * @var array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    private $testCases;

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function __construct()
    {
        $this->description = '';
        $this->language = '';
        $this->name = '';
        $this->testCases = array();
    }

    /**
     * @{inheritDoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @{inheritDoc}
     */
    public function setName($name)
    {
        $this->name = (string) $name;

        return $this;
    }

    /**
     * @{inheritDoc}
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @{inheritDoc}
     */
    public function setDescription($description)
    {
        $this->description = (string) $description;

        return $this;
    }

    /**
     * @{inheritDoc}
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @{inheritDoc}
     */
    public function setLanguage($language)
    {
        $this->language = (string) $language;

        return $this;
    }

    /**
     * @{inheritDoc}
     */
    public function getTestCases()
    {
        return $this->testCases;
    }

    /**
     * @{inheritDoc}
     */
    public function addTestCase(TestCaseInterface $testCase)
    {
        $this->testCases[] = $testCase;

        return $this;
    }
}
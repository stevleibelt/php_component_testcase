<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-08 
 */

namespace Test\Net\Bazzline\Component\TestCase\Suite;

use Net\Bazzline\Component\TestCase\Suite\Suite;
use Test\Net\Bazzline\Component\TestCase\UnitTestCase;
use Test\Net\Bazzline\Component\TestCase\MockFactory;

class SuiteTest extends UnitTestCase
{
    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-08
     */
    public function testConstructor()
    {
        $suite = $this->getNewSuite();

        $this->assertEquals('', $suite->getDescription());
        $this->assertEquals('', $suite->getLanguage());
        $this->assertEquals('', $suite->getName());
        $this->assertEquals(array(), $suite->getTestCases());
    }

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-08
     */
    public function testSetAndGetDescription()
    {
        $suite = $this->getNewSuite();
        $description = 'test description';

        $suite->setDescription($description);

        $this->assertEquals($description, $suite->getDescription());
    }

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-08
     */
    public function testSetAndGetLanguage()
    {
        $suite = $this->getNewSuite();
        $language = 'test language';

        $suite->setLanguage($language);

        $this->assertEquals($language, $suite->getLanguage());
    }

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-08
     */
    public function testSetAndGetName()
    {
        $suite = $this->getNewSuite();
        $name = 'test name';

        $suite->setName($name);

        $this->assertEquals($name, $suite->getName());
    }

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-08
     */
    public function testAddTestCaseAndGetTestCases()
    {
        $suite = $this->getNewSuite();
        $testCases = array(
            MockFactory::getTestCase(),
            MockFactory::getTestCase()
        );

        foreach ($testCases as $testCase) {
            $suite->addTestCase($testCase);
        }

        $this->assertEquals($testCases, $suite->getTestCases());
    }

    /**
     * @return Suite
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-08
     */
    private function getNewSuite()
    {
        return new Suite();
    }
}
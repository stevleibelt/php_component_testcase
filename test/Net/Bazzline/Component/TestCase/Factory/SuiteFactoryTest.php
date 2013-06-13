<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-13 
 */

namespace Test\Net\Bazzline\Component\TestCase\Factory;

use Net\Bazzline\Component\TestCase\Factory\SuiteFactory;
use Test\Net\Bazzline\Component\TestCase\UnitTestCase;
use stdClass;

class SuiteFactoryTest extends UnitTestCase
{
    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-13
     */
    public function testCreate()
    {
        $factory = SuiteFactory::create();

        $this->assertEquals(
            'Net\Bazzline\Component\TestCase\Factory\SuiteFactory',
            get_class($factory)
        );
    }

    /**
     * @return array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-13
     */
    public static function invalidSourceTypeProvider()
    {
        return array(
            array(null),
            array(1),
            array(''),
            array(new stdClass())
        );
    }

    /**
     * @dataProvider invalidSourceTypeProvider
     * @expectedException \Net\Bazzline\Component\TestCase\Factory\InvalidArgumentException
     * @expectedExceptionMessage No valid source file given
     *
     * @param mixed $source
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-13
     */
    public function testFromSourceWithInvalidType($source)
    {
        $factory = SuiteFactory::create();
        $factory->fromSource($source);
    }

    /**
     * @expectedException \Net\Bazzline\Component\TestCase\Factory\InvalidArgumentException
     * @expectedExceptionMessage No test cases found in suite
     *
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-13
     */
    public function testFromSourceWithInvalidSource()
    {
        $source = self::getPathToResource() . DIRECTORY_SEPARATOR .
            'Factory' . DIRECTORY_SEPARATOR .
            'Suite' . DIRECTORY_SEPARATOR .
            'invalidSuite.php';

        $factory = SuiteFactory::create();
        $factory->fromSource($source);
    }

    /**
     * @return array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-13
     */
    public static function validSourceTypeProvider()
    {
        $baseFilePath = self::getPathToResource() . DIRECTORY_SEPARATOR .
            'Factory' . DIRECTORY_SEPARATOR . 'Suite';

        return array(
            array(
                'source' => $baseFilePath . DIRECTORY_SEPARATOR . 'validSuite.php'
            ),
            array(
                'source' => $baseFilePath . DIRECTORY_SEPARATOR . 'validSuite.yaml'
            ),
            array(
                'source' => $baseFilePath . DIRECTORY_SEPARATOR . 'validSuite.json'
            )
        );
    }

    /**
     * @dataProvider validSourceTypeProvider
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-13
     */
    public function testFromSourceWithValidSource($source)
    {
        $filePath = self::getPathToResource() . DIRECTORY_SEPARATOR .
            'Factory' . DIRECTORY_SEPARATOR .
            'Suite' . DIRECTORY_SEPARATOR .
            'validSuite.php';
        $fileContent = require($filePath);

        $factory = SuiteFactory::create();
        $suite = $factory->fromSource($source);

        $this->assertEquals(
            $fileContent['name'],
            $suite->getName()
        );
        $this->assertEquals(
            $fileContent['language'],
            $suite->getLanguage()
        );
        $this->assertEquals(
            $fileContent['description'],
            $suite->getDescription()
        );
        $this->assertIsArray($suite->getTestCases());
        foreach ($suite->getTestCases() as $testCase) {
            $this->assertTrue(
                $testCase instanceof \Net\Bazzline\Component\TestCase\TestCase\TestCaseInterface
            );
        }
    }
}
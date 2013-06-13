<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-13 
 */

namespace Test\Net\Bazzline\Component\TestCase\Factory;

use Net\Bazzline\Component\TestCase\Factory\TestCaseFactory;
use Test\Net\Bazzline\Component\TestCase\UnitTestCase;
use stdClass;

/**
 * Class TestCaseFactoryTest
 *
 * @package Test\Net\Bazzline\Component\TestCase\Factory
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-13
 */
class TestCaseFactoryTest extends UnitTestCase
{
    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-13
     */
    public function AtestCreate()
    {
        $factory = TestCaseFactory::create();

        $this->assertEquals(
            'Net\Bazzline\Component\TestCase\Factory\TestCaseFactory',
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
    public function AtestFromSourceWithInvalidType($source)
    {
        $factory = TestCaseFactory::create();
        $factory->fromSource($source);
    }

    /**
     * @expectedException \Net\Bazzline\Component\TestCase\Factory\InvalidArgumentException
     * @expectedExceptionMessage No problemDefinition found in source array
     *
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-13
     */
    public function AtestFromSourceWithInvalidSource()
    {
        $source = self::getPathToResource() . DIRECTORY_SEPARATOR .
            'Factory' . DIRECTORY_SEPARATOR .
            'TestCase' . DIRECTORY_SEPARATOR .
            'invalidTestCase.php';

        $factory = TestCaseFactory::create();
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
            'Factory' . DIRECTORY_SEPARATOR . 'TestCase';

        return array(
            array(
                'source' => $baseFilePath . DIRECTORY_SEPARATOR . 'validTestCase.php'
            ),
            array(
                'source' => $baseFilePath . DIRECTORY_SEPARATOR . 'validTestCase.yaml'
            ),
            array(
                'source' => $baseFilePath . DIRECTORY_SEPARATOR . 'validTestCase.json'
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
        $factory = TestCaseFactory::create();
        $testCase = $factory->fromSource($source);

        $this->assertTrue(
            $testCase->getQuestion() instanceof \Net\Bazzline\Component\TestCase\Question\QuestionInterface
        );
        $this->assertTrue(
            $testCase->getAnswer() instanceof \Net\Bazzline\Component\TestCase\Answer\AnswerInterface
        );
    }
}
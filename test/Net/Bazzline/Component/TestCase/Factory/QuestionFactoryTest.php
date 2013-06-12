<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-12 
 */

namespace Test\Net\Bazzline\Component\TestCase\Factory;

use Net\Bazzline\Component\TestCase\Factory\QuestionFactory;
use Test\Net\Bazzline\Component\TestCase\UnitTestCase;
use stdClass;

/**
 * Class QuestionFactoryTest
 *
 * @package Test\Net\Bazzline\Component\TestCase\Factory
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-12
 */
class QuestionFactoryTest extends UnitTestCase
{
    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-12
     */
    public function testCreate()
    {
        $factory = QuestionFactory::create();

        $this->assertEquals(
            'Net\Bazzline\Component\TestCase\Factory\QuestionFactory',
            get_class($factory)
        );
    }

    /**
     * @return array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-12
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
     * @since 2013-06-12
     */
    public function testFromSourceWithInvalidType($source)
    {
        $factory = QuestionFactory::create();
        $factory->fromSource($source);
    }

    /**
     * @expectedException \Net\Bazzline\Component\TestCase\Factory\InvalidArgumentException
     * @expectedExceptionMessage No problemDefinition found in source array
     *
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-11
     */
    public function testFromSourceWithInvalidSource()
    {
        $source = self::getPathToResource() . DIRECTORY_SEPARATOR .
            'Factory' . DIRECTORY_SEPARATOR .
            'Question' . DIRECTORY_SEPARATOR .
            'invalidQuestion.php';

        $factory = QuestionFactory::create();
        $factory->fromSource($source);
    }
}
<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-09 
 */

namespace Test\Net\Bazzline\Component\TestCase\Factory;

use Net\Bazzline\Component\TestCase\Factory\AnswerFactory;
use Test\Net\Bazzline\Component\TestCase\UnitTestCase;
use Test\Net\Bazzline\Component\TestCase\MockFactory;
use stdClass;

/**
 * Class AnswerFactoryTest
 *
 * @package Test\Net\Bazzline\Component\TestCase\Factory
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-10
 */
class AnswerFactoryTest extends UnitTestCase
{
    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-10
     */
    public function testCreate()
    {
        $factory = AnswerFactory::create();

        $this->assertEquals(
            'Net\Bazzline\Component\TestCase\Factory\AnswerFactory',
            get_class($factory)
        );
    }

    /**
     * @return array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-10
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
     * @since 2013-06-10
     */
    public function testFromSourceWithInvalidType($source)
    {
        $factory = AnswerFactory::create();

        $factory->fromSource($source);
    }
}
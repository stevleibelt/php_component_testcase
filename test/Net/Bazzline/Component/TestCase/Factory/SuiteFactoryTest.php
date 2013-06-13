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
}
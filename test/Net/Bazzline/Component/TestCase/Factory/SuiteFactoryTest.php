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

}
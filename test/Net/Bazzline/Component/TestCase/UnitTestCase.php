<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-08 
 */

namespace Test\Net\Bazzline\Component\TestCase;

use PHPUnit_Framework_TestCase;
use Test\Net\Bazzline\Component\TestCase\MockFactory;

/**
 * Class UnitTestCase
 *
 * @package Test\Net\Bazzline\Component\TestCase
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-08
 */
class UnitTestCase extends PHPUnit_Framework_TestCase
{
    /**
     * Tears down test case
     *
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-08
     */
    protected function tearDown()
    {
        MockFactory::tearDown();
    }
}
<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-08 
 */

namespace Net\Bazzline\Component\TestCase\Factory;

/**
 * Class FromSourceFactoryInterface
 *
 * @package Net\Bazzline\Component\TestCase\Factory
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-08
 */
interface FromSourceFactoryInterface
{
    /**
     * @return FromSourceFactoryInterface
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-08
     */
    public static function create();

    /**
     * Creates object
     *
     * @param string $source - relative source filename
     * @return object
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-08
     */
    public function fromSource($source);
}
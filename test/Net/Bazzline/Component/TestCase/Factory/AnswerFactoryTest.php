<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-09 
 */

namespace Test\Net\Bazzline\Component\TestCase\Factory;

use Net\Bazzline\Component\TestCase\Factory\AnswerFactory;
use Test\Net\Bazzline\Component\TestCase\UnitTestCase;
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

    /**
     * @expectedException \Net\Bazzline\Component\TestCase\Factory\InvalidArgumentException
     * @expectedExceptionMessage No type found in source array
     *
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-11
     */
    public function testFromSourceWithInvalidSource()
    {
        $source = self::getPathToResource() . DIRECTORY_SEPARATOR .
            'Factory' . DIRECTORY_SEPARATOR .
            'Answer' . DIRECTORY_SEPARATOR .
            'invalidAnswer.php';

        $factory = AnswerFactory::create();
        $factory->fromSource($source);
    }

    /**
     * @return array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-10
     */
    public static function validSourceTypeProvider()
    {
        $baseFilePath = self::getPathToResource() . DIRECTORY_SEPARATOR .
            'Factory' . DIRECTORY_SEPARATOR . 'Answer';

        return array(
            array(
                'source' => $baseFilePath . DIRECTORY_SEPARATOR . 'validAnswer.php',
                'type' => 'SingleAnswer'
            ),
            array(
                'source' => $baseFilePath . DIRECTORY_SEPARATOR . 'validAnswer.yaml',
                'type' => 'SingleAnswer'
            ),
            array(
                'source' => $baseFilePath . DIRECTORY_SEPARATOR . 'validAnswer.json',
                'type' => 'SingleAnswer'
            )
        );
    }

    /**
     * @dataProvider validSourceTypeProvider
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-10
     */
    public function testFromSourceWithValidSource($source, $type)
    {
        $filePath = self::getPathToResource() . DIRECTORY_SEPARATOR .
            'Factory' . DIRECTORY_SEPARATOR .
            'Answer' . DIRECTORY_SEPARATOR .
            'validAnswer.php';
        $fileContent = require($filePath);

        $factory = AnswerFactory::create();
        $answer = $factory->fromSource($source);

        $this->assertInstanceOf(
            '\\Net\\Bazzline\\Component\\TestCase\\Answer\\' . $type,
            $answer
        );
        $this->assertEquals(
            array_values($fileContent['opportunities']),
            array_values($answer->getOpportunities())
        );
        $this->assertEquals(
            $type,
            $answer->getType()
        );
        $this->assertEquals(
            array('Opportunity Two'),
            array_values($answer->getValidOpportunities())
        );
    }
}
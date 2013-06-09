<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-08 
 */

namespace Net\Bazzline\Component\TestCase\Factory;

use Net\Bazzline\Component\Converter\ConverterFactory;

/**
 * Class FactoryAbstract
 *
 * @package Net\Bazzline\Component\TestCase\Factory
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-08
 */
abstract class FactoryAbstract implements FromSourceFactoryInterface
{
    /**
     * Converts content of provided source to a php array
     *
     * @param string $source - source file path
     * @return array
     * @throws InvalidArgumentException
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-08
     */
    protected function getSourceAsPhpArray($source)
    {
        if (!is_string($source)
            || !file_exists($source)) {
            throw new InvalidArgumentException(
                'No valid source file given'
            );
        }

        $extension = $this->getFilenameExtension($source);
        $converter = $this->getConverter($extension);
        $content = ($extension == 'php') ? require_once($source) : file_get_contents($source);
        $converter->fromSource($content);

        return $converter->toPhpArray();
    }

    /**
     * Returns the assumed file extension. Assumed that the extension is the
     *  last string after the last available dot (".")
     * Taken from https://github.com/stevleibelt/php_configuration_format_converter/blob/master/source/Net/Bazzline/ConfigurationFormatConverter/Command/ConvertCommand.php
     *
     * @param string $filename - the source you want to get the extension
     * @return string
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-08
     */
    protected function getFilenameExtension($filename)
    {
        $filenameAsArray = explode('.', $filename);

        return  (strtolower(end($filenameAsArray)));
    }

    /**
     * Returns a converter based on the file extension
     * Taken from https://github.com/stevleibelt/php_configuration_format_converter/blob/master/source/Net/Bazzline/ConfigurationFormatConverter/Command/ConvertCommand.php
     *
     * @param string $extension - the file extension (php, json, yaml or xml)
     * @return \Net\Bazzline\Component\Converter\ConverterInterface
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-08
     */
    protected function getConverter($extension)
    {
        $factory = ConverterFactory::buildDefault();
        $extensionToConverter = array(
            'php' => 'Net\Bazzline\Component\Converter\PhpArrayConverter',
            'json' => 'Net\Bazzline\Component\Converter\JSONConverter',
            'yaml' => 'Net\Bazzline\Component\Converter\YAMLConverter',
            'xml' => 'Net\Bazzline\Component\Converter\XMLConverter'
        );

        $converterName = $extensionToConverter[$extension];

        return $factory->get($converterName);
    }
}
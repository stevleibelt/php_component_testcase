<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-08 
 */

namespace Net\Bazzline\Component\TestCase\Factory;

use Net\Bazzline\Component\TestCase\Suite\Suite;

/**
 * Class SuiteFactory
 *
 * @package Net\Bazzline\Component\TestCase\Factory
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-08
 */
class SuiteFactory extends FactoryAbstract
{
    /**
     * Creates factory
     *
     * @return FromSourceFactoryInterface|SuiteFactory
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-08
     */
    public static function create()
    {
        return new self();
    }

    /**
     * Creates suite from source
     *
     * @param string $source - relative path to source
     * @return Suite
     * @throws InvalidArgumentException
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-08
     */
    public function fromSource($source)
    {
        $sourceAsArray = $this->getSourceAsPhpArray($source);

        if (!is_array($sourceAsArray)) {
            throw new InvalidArgumentException(
                'Source has to be from type array'
            );
        }

        if (!isset($array['pathToTestCases'])
            || empty($array['pathToTestCases'])) {
            throw new InvalidArgumentException(
                'No test cases found in suite'
            );
        }

        $suite = new Suite();
        $testCaseFactory = TestCaseFactory::create();

        $suite->setName($array['name']);
        $suite->setLanguage($array['language']);
        $suite->setDescription($array['description']);
        foreach ($array['pathToTestCases'] as $testCaseFilename) {
            if (file_exists($testCaseFilename)
                && is_readable($testCaseFilename)) {
                $testCase = $testCaseFactory->fromSource($testCaseFilename);
                $suite->addTestCase($testCase);
            }
        }

        return $suite;
    }
}
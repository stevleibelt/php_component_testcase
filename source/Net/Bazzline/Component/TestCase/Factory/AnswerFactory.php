<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-08 
 */

namespace Net\Bazzline\Component\TestCase\Factory;

/**
 * Class AnswerFactory
 *
 * @package Net\Bazzline\Component\TestCase\Factory
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-08
 */
class AnswerFactory extends FactoryAbstract
{
    /**
     * Creates factory
     *
     * @return AnswerFactory|FromSourceFactoryInterface
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-08
     */
    public static function create()
    {
        return new self();
    }

    /**
     * Creates a answer from source
     *
     * @param string $source - relative source filename
     * @return \Net\Bazzline\Component\TestCase\Answer\AnswerInterface
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

        if (!isset($sourceAsArray['type'])) {
            throw new InvalidArgumentException(
                'No type found in source array'
            );
        }

        if ((!isset($sourceAsArray['opportunities']))
            || (!is_array($sourceAsArray['opportunities']))
            || (empty($sourceAsArray['opportunities']))) {
            throw new InvalidArgumentException(
                'No opportunities found in source array'
            );
        }

        if ((!isset($sourceAsArray['validOpportunities']))
            || (!is_array($sourceAsArray['validOpportunities']))
            || (empty($sourceAsArray['validOpportunities']))) {
            throw new InvalidArgumentException(
                'No valid opportunities found in source array'
            );
        }

        $answerClass = 'Net\\Bazzline\\Component\\TestCase\\Answer\\' . $sourceAsArray['type'];
        if (!class_exists($answerClass)) {
            throw new InvalidArgumentException(
                'Not supported type found in source array'
            );
        }

        $answer = new $answerClass();
        foreach ($sourceAsArray['opportunities'] as $opportunity) {
            $answer->addOpportunity($opportunity);
        }
        foreach ($sourceAsArray['validOpportunities'] as $validOpportunity) {
            $answer->addValidOpportunity($validOpportunity);
        }

        return $answer;
    }
}
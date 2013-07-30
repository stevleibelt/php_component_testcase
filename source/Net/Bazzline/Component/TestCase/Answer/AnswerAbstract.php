<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-07 
 */

namespace Net\Bazzline\Component\TestCase\Answer;

/**
 * Class AnswerAbstract
 *
 * @package Net\Bazzline\Component\TestCase\Answer
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-07
 */
abstract class AnswerAbstract implements AnswerInterface
{
    /**
     * @var array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    protected $enteredOpportunities;

    /**
     * @var array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    protected $opportunities;

    /**
     * @var array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    protected $validOpportunities;

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    public function __construct()
    {
        $this->enteredOpportunities = array();
        $this->opportunities = array();
        $this->validOpportunities = array();
    }

    /**
     * @{inheritdoc}
     */
    public function getOpportunities()
    {
        return $this->opportunities;
    }

    /**
     * @{inheritdoc}
     */
    public function addEnteredOpportunity($enteredOpportunity)
    {
        if (isset($this->enteredOpportunities[md5($enteredOpportunity)])) {
            throw new InvalidArgumentException(
                'Opportunity already entered.'
            );
        }
        $this->enteredOpportunities[md5($enteredOpportunity)] = $enteredOpportunity;

        return $this;
    }

    /**
     * @{inheritdoc}
     */
    public function getEnteredOpportunities()
    {
        return $this->enteredOpportunities;
    }

    /**
     * @{inheritdoc}
     */
    public function getValidOpportunities()
    {
        return $this->validOpportunities;
    }

    /**
     * @{inheritdoc}
     */
    public function getType()
    {
        $classNameWithNamespace = get_class($this);
        $classNameWithoutNamespace = explode('\\', $classNameWithNamespace);

        return end($classNameWithoutNamespace);
    }

    /**
     * @{inheritdoc}
     */
    public function addOpportunity($opportunity)
    {
        $this->opportunities[md5($opportunity)] = $opportunity;

        return $this;
    }

    /**
     * @{inheritdoc}
     */
    public function addValidOpportunity($validOpportunity)
    {
        if (isset($this->validOpportunities[md5($validOpportunity)])) {
            throw new InvalidArgumentException(
                'Valid opportunity already entered.'
            );
        }
        if (!isset($this->opportunities[md5($validOpportunity)])) {
            throw new InvalidArgumentException(
                'Valid opportunity not available in opportunities.'
            );
        }
        $this->validOpportunities[md5($validOpportunity)] = $validOpportunity;

        return $this;
    }

    /**
     * @{inheritdoc}
     */
    public function validateEnteredOpportunities()
    {
        $isValid = ($this->getPercentageOfAccuracy() == 100);

        return $isValid;
    }
}
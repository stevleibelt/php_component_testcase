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
    protected $opportunities;

    /**
     * @var array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-26
     */
    protected $selectedOpportunities;

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
        $this->opportunities = array();
        $this->selectedOpportunities = array();
        $this->validOpportunities = array();
    }

    /**
     * @{inheritDoc}
     */
    public function getOpportunities()
    {
        return $this->opportunities;
    }

    /**
     * @{inheritDoc}
     */
    public function addSelectedOpportunity($selectedOpportunity)
    {
        $this->selectedOpportunities[md5($selectedOpportunity)] = $selectedOpportunity;

        return $this;
    }

    /**
     * @{inheritDoc}
     */
    public function getValidOpportunities()
    {
        return $this->validOpportunities;
    }

    /**
     * @{inheritDoc}
     */
    public function getType()
    {
        $classNameWithNamespace = get_class($this);
        $classNameWithoutNamespace = explode('\\', $classNameWithNamespace);

        return end($classNameWithoutNamespace);
    }

    /**
     * @{inheritDoc}
     */
    public function addOpportunity($opportunity)
    {
        $this->opportunities[md5($opportunity)] = $opportunity;

        return $this;
    }

    /**
     * @{inheritDoc}
     */
    public function addValidOpportunity($validOpportunity)
    {
        $this->validOpportunities[md5($validOpportunity)] = $validOpportunity;

        return $this;
    }
}
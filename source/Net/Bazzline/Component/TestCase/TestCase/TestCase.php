<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26
 */
namespace Net\Bazzline\Component\TestCase\TestCase;

use Net\Bazzline\Component\TestCase\Answer\AnswerInterface;
use Net\Bazzline\Component\TestCase\Question\QuestionInterface;

/**
 * Class TestCase
 *
 * @package Net\Bazzline\Component\TestCase\TestCase
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26
 */
class TestCase implements TestCaseInterface
{
    /**
     * @var AnswerInterface
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-25
     */
    protected $answer;

    /**
     * @var QuestionInterface
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-25
     */
    protected $question;

    /**
     * @{inheritdoc}
     */
    public function getAnswer()
    {
        if (is_null($this->answer)) {
            throw new RuntimeException(
                'Answer not set.'
            );
        }

        return $this->answer;
    }

    /**
     * @{inheritdoc}
     */
    public function setAnswer(AnswerInterface $answer)
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * @{inheritdoc}
     */
    public function getQuestion()
    {
        if (is_null($this->question)) {
            throw new RuntimeException(
                'Question not set.'
            );
        }

        return $this->question;
    }

    /**
     * @{inheritdoc}
     */
    public function setQuestion(QuestionInterface $question)
    {
        $this->question = $question;

        return $this;
    }
}

<?php
/**
 * @author    Jonas Eriksson <jonas.eriksson@interactivesolutions.se>
 *
 * @copyright Interactive Solutions
 */
declare(strict_types=1);

namespace InteractiveSolutions\Sms\BackgroundTask;

use InteractiveSolutions\Bernard\Message\AbstractExplicitMessage;

final class SendSmsMessage extends AbstractExplicitMessage
{
    /**
     * @var string
     */
    private $to;

    /**
     * @var string
     */
    private $message;

    /**
     * @var string
     */
    private $queue;

    /**
     * @param string $to
     * @param string $message
     * @param string $queue
     */
    public function __construct(string $to, string $message, string $queue = 'sms')
    {
        $this->to      = $to;
        $this->message = $message;
        $this->queue   = $queue;
    }

    /**
     * @return string
     */
    public function getTo(): string
    {
        return $this->to;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    public function getQueue(): string
    {
        return $this->queue;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return SendSmsTask::class;
    }
}

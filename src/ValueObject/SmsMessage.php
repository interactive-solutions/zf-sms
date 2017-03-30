<?php
/**
 * @author    Jonas Eriksson <jonas.eriksson@interactivesolutions.se>
 *
 * @copyright Interactive Solutions
 */
declare(strict_types=1);

namespace InteractiveSolutions\Sms\ValueObject;

use InteractiveSolutions\Bernard\Message\AbstractExplicitMessage;
use InteractiveSolutions\Sms\BackgroundTask\SendSmsTask;

/**
 * Class SmsMessage
 * @docs https://46elks.com/docs
 */
final class SmsMessage extends AbstractExplicitMessage
{
    const QUEUE = 'sms';

    /**
     * @var string
     */
    protected $to;

    /**
     * @var string
     */
    protected $message;

    /**
     * @var bool
     */
    protected $flashSms = false;

    /**
     * @param string $to
     * @param string $message
     * @param bool|string $flashSms
     */
    public function __construct(string $to, string $message, bool $flashSms = false)
    {
        $this->to       = $to;
        $this->message  = $message;
        $this->flashSms = $flashSms;
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

    /**
     * @return bool
     */
    public function isFlashSms(): bool
    {
        return $this->flashSms;
    }

    public function toArray(): array
    {
        $data            = [];
        $data['to']      = $this->to;
        $data['message'] = $this->message;

        if ($this->flashSms) {
            $data['flashSms'] = 'yes';
        }

        return $data;
    }

    public function getQueue(): string
    {
        return self::QUEUE;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return SendSmsTask::class;
    }
}

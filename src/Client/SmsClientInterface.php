<?php
/**
 * @author    Jonas Eriksson <jonas.eriksson@interactivesolutions.se>
 *
 * @copyright Interactive Solutions
 */
declare(strict_types=1);

namespace InteractiveSolutions\Sms\Client;

use InteractiveSolutions\Sms\ValueObject\SentSmsResponse;
use InteractiveSolutions\Sms\ValueObject\SmsMessage;

interface SmsClientInterface
{
    /**
     * Send a sms
     *
     * @param SmsMessage $sms
     * @return SentSmsResponse
     *
     * @throws \InteractiveSolutions\Sms\Client\Exception\InvalidJsonResponseException
     * @throws \InteractiveSolutions\Sms\Client\Exception\FailedToSendSmsException
     */
    public function sendSms(SmsMessage $sms): SentSmsResponse;
}

<?php
/**
 * @author    Jonas Eriksson <jonas.eriksson@interactivesolutions.se>
 *
 * @copyright Interactive Solutions
 */

namespace InteractiveSolutions\Sms\Service;

use InteractiveSolutions\Sms\ValueObject\SentSmsResponse;
use InteractiveSolutions\Sms\ValueObject\SmsMessage;

interface SmsServiceInterface
{
    /**
     * Returns true on success, otherwise false
     *
     * @param SmsMessage $sms
     *
     * @param SmsMessage $sms
     * @return SentSmsResponse
     *
     * @throws \InteractiveSolutions\Sms\Client\Exception\InvalidJsonResponseException
     * @throws \InteractiveSolutions\Sms\Client\Exception\FailedToSendSmsException
     */
    public function send(SmsMessage $sms): SentSmsResponse;
}

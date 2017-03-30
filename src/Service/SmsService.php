<?php
/**
 * @author    Jonas Eriksson <jonas.eriksson@interactivesolutions.se>
 *
 * @copyright Interactive Solutions
 */
declare(strict_types=1);

namespace InteractiveSolutions\Sms\Service;

use InteractiveSolutions\Sms\Client\SmsClientInterface;
use InteractiveSolutions\Sms\ValueObject\SentSmsResponse;
use InteractiveSolutions\Sms\ValueObject\SmsMessage;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerAwareTrait;

final class SmsService implements SmsServiceInterface, EventManagerAwareInterface
{
    use EventManagerAwareTrait;

    const EVENT_CREATED = 'interactive-solutions:sms:sms-sent';

    /**
     * @var SmsClientInterface
     */
    private $smsClient;

    /**
     * @param SmsClientInterface $smsClient
     */
    public function __construct(SmsClientInterface $smsClient)
    {
        $this->smsClient = $smsClient;
    }

    /**
     * {@inheritdoc}
     */
    public function send(SmsMessage $sms): SentSmsResponse
    {
        $result = $this->smsClient->sendSms($sms);

        $this
            ->getEventManager()
            ->trigger(self::EVENT_CREATED, $this, ['sms' => $result]);

        return $result;
    }
}

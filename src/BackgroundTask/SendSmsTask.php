<?php
/**
 * @author    Jonas Eriksson <jonas.eriksson@interactivesolutions.se>
 *
 * @copyright Interactive Solutions
 */
declare(strict_types=1);

namespace InteractiveSolutions\Sms\BackgroundTask;

use DateTime;
use InteractiveSolutions\Sms\Service\SmsServiceInterface;
use InteractiveSolutions\Sms\ValueObject\SmsMessage;
use Throwable;
use Zend\Console\ColorInterface;
use Zend\Console\Console;

final class SendSmsTask
{
    /**
     * @var SmsServiceInterface
     */
    private $smsService;

    /**
     * @param SmsServiceInterface $smsService
     */
    public function __construct(SmsServiceInterface $smsService)
    {
        $this->smsService = $smsService;
    }

    public function __invoke(SendSmsMessage $message)
    {
        $smsMessage = new SmsMessage($message->getTo(), $message->getMessage());

        Console::getInstance()->write(sprintf('[%s] ', (new DateTime())->format('Y-m-d H:i:s')), ColorInterface::WHITE);
        Console::getInstance()->write(sprintf('Sending a sms to %s', $smsMessage->getTo()));

        try {
            $this->smsService->send($smsMessage);

            Console::getInstance()->writeLine(' success', ColorInterface::GREEN);
        } catch (Throwable $e) {
            $exceptionMessage = sprintf('Exception: %s with message: %s', get_class($e), $e->getMessage());

            Console::getInstance()->writeLine(' failed', ColorInterface::RED);
            Console::getInstance()->writeLine($exceptionMessage);

            throw $e;
        }
    }
}

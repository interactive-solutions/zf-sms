<?php
/**
 * @author    Jonas Eriksson <jonas.eriksson@interactivesolutions.se>
 *
 * @copyright Interactive Solutions
 */
declare(strict_types=1);

namespace InteractiveSolutions\Sms\Factory\BackgroundTask;

use InteractiveSolutions\Bernard\Router\ConsumerTaskManager;
use InteractiveSolutions\Sms\BackgroundTask\SendSmsTask;
use InteractiveSolutions\Sms\Service\SmsService;
use InteractiveSolutions\Sms\Service\SmsServiceInterface;

final class SendSmsTaskFactory
{
    public function __invoke(ConsumerTaskManager $manager): SendSmsTask
    {
        /** @var SmsServiceInterface $smsService */
        $smsService = $manager->getServiceLocator()->get(SmsService::class);

        return new SendSmsTask(
            $smsService
        );
    }
}

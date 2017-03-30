<?php
/**
 * @author    Jonas Eriksson <jonas.eriksson@interactivesolutions.se>
 *
 * @copyright Interactive Solutions
 */
declare(strict_types=1);

namespace InteractiveSolutions\Sms\Factory\Service;

use InteractiveSolutions\Sms\Client\ElkClient;
use InteractiveSolutions\Sms\Service\DeliveryReportService;
use InteractiveSolutions\Sms\Service\Listener\CreateDeliveryReportListener;
use InteractiveSolutions\Sms\Service\SmsService;
use InteractiveSolutions\Sms\Service\SmsServiceInterface;
use Interop\Container\ContainerInterface;

final class SmsServiceFactory
{
    public function __invoke(ContainerInterface $container): SmsServiceInterface
    {
        $service = new SmsService($container->get(ElkClient::class));

        /* @var CreateDeliveryReportListener $listener */
        $listener = $container->get(CreateDeliveryReportListener::class);

        $listener
            ->attach($service->getEventManager());

        return $service;
    }
}

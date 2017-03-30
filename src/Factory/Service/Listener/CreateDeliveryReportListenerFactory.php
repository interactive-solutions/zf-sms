<?php
/**
 * @author Erik Norgren <erik.norgren@interactivesolutions.se>
 * @copyright Interactive Solutions
 */

declare(strict_types=1);

namespace InteractiveSolutions\Sms\Factory\Service\Listener;

use InteractiveSolutions\Sms\Service\DeliveryReportService;
use InteractiveSolutions\Sms\Service\Listener\CreateDeliveryReportListener;
use Interop\Container\ContainerInterface;

final class CreateDeliveryReportListenerFactory
{
    /**
     * @param ContainerInterface $container
     * @return CreateDeliveryReportListener
     */
    public function __invoke(ContainerInterface $container): CreateDeliveryReportListener
    {
        return new CreateDeliveryReportListener($container->get(DeliveryReportService::class));
    }
}

<?php
/**
 * @author Erik Norgren <erik.norgren@interactivesolutions.se>
 * @copyright Interactive Solutions
 */

declare(strict_types=1);

namespace InteractiveSolutions\Sms\Factory\Service;

use Doctrine\ORM\EntityManager;
use InteractiveSolutions\Sms\Service\DeliveryReportService;
use Interop\Container\ContainerInterface;

final class DeliveryReportServiceFactory
{
    /**
     * @param ContainerInterface $container
     * @return DeliveryReportService
     */
    public function __invoke(ContainerInterface $container): DeliveryReportService
    {
        return new DeliveryReportService($container->get(EntityManager::class));
    }
}

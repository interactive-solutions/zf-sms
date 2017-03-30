<?php
/**
 * @author Erik Norgren <erik.norgren@interactivesolutions.se>
 * @copyright Interactive Solutions
 */

declare(strict_types=1);

namespace InteractiveSolutions\Sms\Factory\Controller;

use Doctrine\ORM\EntityManager;
use InteractiveSolutions\Sms\Entity\DeliveryReportEntity;
use InteractiveSolutions\Sms\Service\DeliveryReportService;
use InteractiveSolutions\Sms\Controller\DeliveryReportCollectionController;
use Zend\Mvc\Controller\ControllerManager;

final class DeliveryReportCollectionControllerFactory
{
    public function __invoke(ControllerManager $controllerManager): DeliveryReportCollectionController
    {
        $container = $controllerManager->getServiceLocator();

        return new DeliveryReportCollectionController(
            $container->get(EntityManager::class)->getRepository(DeliveryReportEntity::class),
            $container->get(DeliveryReportService::class)
        );
    }
}

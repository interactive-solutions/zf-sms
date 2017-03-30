<?php
/**
 * @author Erik Norgren <erik.norgren@interactivesolutions.se>
 * @copyright Interactive Solutions
 */

declare(strict_types=1);

namespace InteractiveSolutions\Sms\Service;

use Doctrine\ORM\EntityManager;
use InteractiveSolutions\Sms\Entity\DeliveryReportEntity;

final class DeliveryReportService implements DeliveryReportServiceInterface
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * DeliveryReportService constructor.
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * {@inheritdoc}
     */
    public function create(DeliveryReportEntity $deliveryReport): void
    {
        $this->entityManager->persist($deliveryReport);
        $this->entityManager->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function update(DeliveryReportEntity $deliveryReport): void
    {
        $this->entityManager->flush();
    }
}

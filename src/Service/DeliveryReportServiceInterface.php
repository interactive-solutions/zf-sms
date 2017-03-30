<?php
/**
 * @author Erik Norgren <erik.norgren@interactivesolutions.se>
 * @copyright Interactive Solutions
 */

declare(strict_types=1);

namespace InteractiveSolutions\Sms\Service;

use InteractiveSolutions\Sms\Entity\DeliveryReportEntity;

interface DeliveryReportServiceInterface
{
    /**
     * Create a delivery report
     *
     * @param DeliveryReportEntity $deliveryReport
     */
    public function create(DeliveryReportEntity $deliveryReport): void;

    /**
     * Update a delivery report
     *
     * @param DeliveryReportEntity $deliveryReport
     */
    public function update(DeliveryReportEntity $deliveryReport): void;
}

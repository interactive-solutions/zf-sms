<?php
/**
 * @author Erik Norgren <erik.norgren@interactivesolutions.se>
 * @copyright Interactive Solutions
 */

/* @var \InteractiveSolutions\Sms\Entity\DeliveryReportEntity $report */
$report = $this->report;

return [
    'id'          => $report->getId(),
    'status'      => $report->getStatus(),
    'deliveredAt' => $report->getDeliveredAt() ? $report->getDeliveredAt()->format(DateTime::RFC3339) : null,
    'createdAt'   => $report->getCreatedAt()->format(DateTime::RFC3339),
    'updatedAt'   => $report->getUpdatedAt()->format(DateTime::RFC3339),
];

<?php
/**
 * @author Erik Norgren <erik.norgren@interactivesolutions.se>
 * @copyright Interactive Solutions
 */

use InteractiveSolutions\Sms\Entity\DeliveryReportEntity;
use Zend\Stdlib\ArrayUtils;

$reports = ArrayUtils::iteratorToArray($this->reports);

$result = [];

$result['data'] = array_map(function(DeliveryReportEntity $report) {
    return $this->renderResource('delivery-report/resource', ['report' => $report]);
}, $reports);

$result['meta'] = $this->renderPaginator($this->reports);

return $result;

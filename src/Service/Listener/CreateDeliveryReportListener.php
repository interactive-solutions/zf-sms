<?php
/**
 * @author Erik Norgren <erik.norgren@interactivesolutions.se>
 * @copyright Interactive Solutions
 */

declare(strict_types=1);

namespace InteractiveSolutions\Sms\Service\Listener;

use InteractiveSolutions\Sms\Entity\DeliveryReportEntity;
use InteractiveSolutions\Sms\Service\DeliveryReportServiceInterface;
use InteractiveSolutions\Sms\Service\SmsService;
use InteractiveSolutions\Sms\ValueObject\SentSmsResponse;
use Zend\EventManager\Event;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;
use Zend\EventManager\ListenerAggregateTrait;

final class CreateDeliveryReportListener implements ListenerAggregateInterface
{
    use ListenerAggregateTrait;

    /**
     * @var DeliveryReportServiceInterface
     */
    private $deliveryReportService;

    /**
     * CreateDeliveryReportListener constructor.
     * @param DeliveryReportServiceInterface $deliveryReportService
     */
    public function __construct(DeliveryReportServiceInterface $deliveryReportService)
    {
        $this->deliveryReportService = $deliveryReportService;
    }

    /**
     * {@inheritdoc}
     */
    public function attach(EventManagerInterface $events)
    {
        $events->attach(SmsService::EVENT_CREATED, [$this, 'createDeliveryReport']);
    }

    public function createDeliveryReport(Event $event): void
    {
        /* @var SentSmsResponse $sms */
        $sms = $event->getParam('sms');

        $deliveryReport = DeliveryReportEntity::create($sms);
        $this->deliveryReportService->create($deliveryReport);
    }
}

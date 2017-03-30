<?php
/**
 * @author    Jonas Eriksson <jonas.eriksson@interactivesolutions.se>
 *
 * @copyright Interactive Solutions
 */
declare(strict_types=1);

use InteractiveSolutions\Sms\BackgroundTask\SendSmsTask;
use InteractiveSolutions\Sms\Client\ElkClient;
use InteractiveSolutions\Sms\Factory\BackgroundTask\SendSmsTaskFactory;
use InteractiveSolutions\Sms\Factory\Client\ElkClientFactory;
use InteractiveSolutions\Sms\Factory\Controller\DeliveryReportCollectionControllerFactory;
use InteractiveSolutions\Sms\Factory\Options\SmsOptionsFactory;
use InteractiveSolutions\Sms\Factory\Service\DeliveryReportServiceFactory;
use InteractiveSolutions\Sms\Factory\Service\Listener\CreateDeliveryReportListenerFactory;
use InteractiveSolutions\Sms\Factory\Service\SmsServiceFactory;
use InteractiveSolutions\Sms\Options\SmsOptions;
use InteractiveSolutions\Sms\Service\DeliveryReportService;
use InteractiveSolutions\Sms\Service\Listener\CreateDeliveryReportListener;
use InteractiveSolutions\Sms\Service\SmsService;
use InteractiveSolutions\Sms\Controller\DeliveryReportCollectionController;

return [
    'service_manager' => [
        'factories' => [
            ElkClient::class             => ElkClientFactory::class,
            SmsOptions::class            => SmsOptionsFactory::class,
            SmsService::class            => SmsServiceFactory::class,
            DeliveryReportService::class => DeliveryReportServiceFactory::class,

            CreateDeliveryReportListener::class => CreateDeliveryReportListenerFactory::class,
        ],
    ],

    'controllers' => [
        'factories' => [
            DeliveryReportCollectionController::class => DeliveryReportCollectionControllerFactory::class,
        ],
    ],

    'interactive_solutions' => [
        'bernard_consumer_manager' => [
            'factories' => [
                SendSmsTask::class => SendSmsTaskFactory::class,
            ],
        ],
    ],

    'doctrine' => include __DIR__ . '/doctrine.config.php',
];

<?php
/**
 * @author    Jonas Eriksson <jonas.eriksson@interactivesolutions.se>
 *
 * @copyright Interactive Solutions
 */
declare(strict_types=1);

namespace InteractiveSolutions\Sms\Factory\Client;

use InteractiveSolutions\Sms\Client\ElkClient;
use InteractiveSolutions\Sms\Options\SmsOptions;
use Interop\Container\ContainerInterface;

final class ElkClientFactory
{
    public function __invoke(ContainerInterface $container): ElkClient
    {
        return new ElkClient($container->get(SmsOptions::class));
    }
}

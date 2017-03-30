<?php
/**
 * @author    Jonas Eriksson <jonas.eriksson@interactivesolutions.se>
 *
 * @copyright Interactive Solutions
 */
declare(strict_types=1);

namespace InteractiveSolutions\Sms\Factory\Options;

use InteractiveSolutions\Sms\Options\SmsOptions;
use Interop\Container\ContainerInterface;

final class SmsOptionsFactory
{
    public function __invoke(ContainerInterface $container): SmsOptions
    {
        $config = $container->get('config')['interactive_solutions']['options'][SmsOptions::class] ?? [];

        return new SmsOptions($config);
    }
}

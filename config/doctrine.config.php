<?php
/**
 * @author Erik Norgren <erik.norgren@interactivesolutions.se>
 * @copyright Interactive Solutions
 */

use Doctrine\ORM\Mapping\Driver\XmlDriver;

return [
    'driver' => [
        'interactive-solutions_sms_driver' => [
            'class'     => XmlDriver::class,
            'paths'     => [
                'default' => __DIR__ . '/doctrine',
            ]
        ],

        'orm_default' => [
            'drivers' => [
                'InteractiveSolutions\Sms\Entity' => 'interactive-solutions_sms_driver'
            ]
        ]
    ],
];

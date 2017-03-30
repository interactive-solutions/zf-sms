<?php
/**
 * @author Erik Norgren <erik.norgren@interactivesolutions.se>
 * @copyright Interactive Solutions
 */

declare(strict_types=1);

namespace InteractiveSolutions\Sms\InputFilter;

use InteractiveSolutions\Postgres\AST\Functions\InArray;
use InteractiveSolutions\Sms\Entity\DeliveryReportEntity;
use InteractiveSolutions\Stdlib\Validator\ObjectExists;
use Zend\InputFilter\InputFilter;

final class DeliveryReportUpdateInputFilter extends InputFilter
{
    public function init()
    {
        $this->add([
            'name'       => 'id',
            'validators' => [
                [
                    'name'    => ObjectExists::class,
                    'options' => [
                        'fields'       => ['id'],
                        'entity_class' => DeliveryReportEntity::class,
                    ],
                ],
            ],
        ]);

        $this->add([
            'name'       => 'status',
            'validators' => [
                [
                    'name'    => InArray::class,
                    'options' => [
                        'haystack' => [
                            DeliveryReportEntity::STATUS_DELIVERED,
                            DeliveryReportEntity::STATUS_FAILED,
                            DeliveryReportEntity::STATUS_SENT,
                        ],
                    ],
                ],
            ],
        ]);

        $this->add([
            'name'     => 'delivered',
            'required' => false,
        ]);
    }
}

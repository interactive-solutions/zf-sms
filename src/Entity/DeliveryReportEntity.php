<?php
/**
 * @author Erik Norgren <erik.norgren@interactivesolutions.se>
 * @copyright Interactive Solutions
 */

declare(strict_types=1);

namespace InteractiveSolutions\Sms\Entity;

use DateTime;
use InteractiveSolutions\Sms\ValueObject\SentSmsResponse;

class DeliveryReportEntity
{
    const STATUS_CREATED   = 'created';
    const STATUS_SENT      = 'sent';
    const STATUS_DELIVERED = 'delivered';
    const STATUS_FAILED    = 'failed';

    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $status;

    /**
     * @var string
     */
    private $sentTo;

    /**
     * @var string
     */
    private $sentFrom;

    /**
     * @var string
     */
    private $message;

    /**
     * @var DateTime
     */
    private $deliveredAt;

    /**
     * @var DateTime
     */
    private $createdAt;

    /**
     * @var DateTime
     */
    private $updatedAt;

    /**
     * Create a delivery report for a sent sms
     *
     * @param SentSmsResponse $data
     * @return DeliveryReportEntity
     */
    public static function create(SentSmsResponse $data): self
    {
        $instance           = new self();
        $instance->id       = $data->getId();
        $instance->message  = $data->getMessage();
        $instance->sentTo   = $data->getTo();
        $instance->sentFrom = $data->getFrom();
        $instance->status   = self::STATUS_CREATED;

        $instance->createdAt = new DateTime();
        $instance->updatedAt = new DateTime();

        return $instance;
    }

    /**
     * Update the status of a delivery report
     *
     * @param DeliveryReportEntity $instance
     * @param array $data
     */
    public static function updateStatus(DeliveryReportEntity $instance, array $data): void
    {
        $instance->status      = $data['status'];
        $instance->deliveredAt = $data['delivered'] ? new DateTime($data['delivered']) : null;

        $instance->updatedAt = new DateTime();
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getSentTo(): string
    {
        return $this->sentTo;
    }

    /**
     * @return string
     */
    public function getSentFrom(): string
    {
        return $this->sentFrom;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @return DateTime
     */
    public function getDeliveredAt(): DateTime
    {
        return $this->deliveredAt;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * @return DateTime
     */
    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }
}

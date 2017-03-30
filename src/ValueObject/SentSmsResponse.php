<?php
/**
 * @author Erik Norgren <erik.norgren@interactivesolutions.se>
 * @copyright Interactive Solutions
 */

declare(strict_types=1);

namespace InteractiveSolutions\Sms\ValueObject;

final class SentSmsResponse
{
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
    private $direction;

    /**
     * @var string
     */
    private $from;

    /**
     * @var string
     */
    private $created;

    /**
     * @var int
     */
    private $parts;

    /**
     * @var string
     */
    private $to;

    /**
     * @var int
     */
    private $cost;

    /**
     * @var string;
     */
    private $message;

    public static function fromArray(array $data): self
    {
        $instance            = new self();

        $instance->id        = $data['id'];
        $instance->status    = $data['status'];
        $instance->direction = $data['direction'];
        $instance->from      = $data['from'];
        $instance->created   = $data['created'];
        $instance->parts     = $data['parts'];
        $instance->to        = $data['to'];
        $instance->cost      = $data['cost'];
        $instance->message   = $data['message'];

        return $instance;
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
    public function getDirection(): string
    {
        return $this->direction;
    }

    /**
     * @return string
     */
    public function getFrom(): string
    {
        return $this->from;
    }

    /**
     * @return string
     */
    public function getCreated(): string
    {
        return $this->created;
    }

    /**
     * @return int
     */
    public function getParts(): int
    {
        return $this->parts;
    }

    /**
     * @return string
     */
    public function getTo(): string
    {
        return $this->to;
    }

    /**
     * @return int
     */
    public function getCost(): int
    {
        return $this->cost;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }
}

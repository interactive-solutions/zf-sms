<?php
/**
 * @author    Jonas Eriksson <jonas.eriksson@interactivesolutions.se>
 *
 * @copyright Interactive Solutions
 */
declare(strict_types=1);

namespace InteractiveSolutions\Sms\Options;

use Zend\Stdlib\AbstractOptions;

final class SmsOptions extends AbstractOptions
{
    /**
     * @var string
     */
    protected $apiUsername;

    /**
     * @var string
     */
    protected $apiPassword;

    /**
     * This is the number we are sending from
     *
     * @var string
     */
    protected $number;

    /**
     * Callback url for delivery reports
     *
     * @var string
     */
    protected $callbackUrl;

    /**
     * @return string
     */
    public function getApiUsername()
    {
        return $this->apiUsername;
    }

    /**
     * @param string $apiUsername
     */
    public function setApiUsername(string $apiUsername = null)
    {
        $this->apiUsername = $apiUsername;
    }

    /**
     * @return string
     */
    public function getApiPassword()
    {
        return $this->apiPassword;
    }

    /**
     * @param string $apiPassword
     */
    public function setApiPassword(string $apiPassword = null)
    {
        $this->apiPassword = $apiPassword;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param string $number
     */
    public function setNumber(string $number = null)
    {
        $this->number = $number;
    }

    /**
     * @return string
     */
    public function getCallbackUrl()
    {
        return $this->callbackUrl;
    }

    /**
     * @param string $callbackUrl
     */
    public function setCallbackUrl(string $callbackUrl = null)
    {
        $this->callbackUrl = $callbackUrl;
    }
}

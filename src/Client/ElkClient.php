<?php
/**
 * @author    Jonas Eriksson <jonas.eriksson@interactivesolutions.se>
 *
 * @copyright Interactive Solutions
 */
declare(strict_types=1);

namespace InteractiveSolutions\Sms\Client;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use InteractiveSolutions\Sms\Options\SmsOptions;
use InteractiveSolutions\Sms\Client\Exception\InvalidJsonResponseException;
use InteractiveSolutions\Sms\Client\Exception\FailedToSendSmsException;
use InteractiveSolutions\Sms\ValueObject\SentSmsResponse;
use InteractiveSolutions\Sms\ValueObject\SmsMessage;
use Zend\Json\Exception\RuntimeException;
use Zend\Json\Json;

final class ElkClient implements SmsClientInterface
{
    const API_URI = 'https://api.46elks.com/a1/';

    /**
     * @var Client
     */
    private $client;

    /**
     * @var SmsOptions
     */
    private $options;

    /**
     * @param SmsOptions $options
     */
    public function __construct(SmsOptions $options)
    {
        $this->options = $options;
        $this->client  = new Client(
            [
                'base_uri' => self::API_URI,
                'timeout'  => 10,
                'auth'     => [
                    $options->getApiUsername(),
                    $options->getApiPassword()
                ]
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function sendSms(SmsMessage $sms): SentSmsResponse
    {
        $body         = $sms->toArray();
        $body['from'] = $this->options->getNumber();

        if ($this->options->getCallbackUrl()) {
            $body['whendelivered'] = $this->options->getCallbackUrl();
        }

        try {
            $response = $this->client->post('sms', [
                'form_params' => $body
            ]);

            $result = Json::decode($response->getBody()->getContents(), Json::TYPE_ARRAY);
        } catch (RequestException $e) {
            throw FailedToSendSmsException::fromErrorResponse($e->getResponse());
        } catch (RuntimeException $e) {
            throw new InvalidJsonResponseException();
        }

        return SentSmsResponse::fromArray($result);
    }
}

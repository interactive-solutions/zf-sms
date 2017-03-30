<?php
/**
 * @author Erik Norgren <erik.norgren@interactivesolutions.se>
 * @copyright Interactive Solutions
 */

declare(strict_types=1);

namespace InteractiveSolutions\Sms\Client\Exception;

use Psr\Http\Message\ResponseInterface;
use RuntimeException;
use Zend\Json\Json;

class FailedToSendSmsException extends RuntimeException
{
    /**
     * @param ResponseInterface $response
     * @return FailedToSendSmsException
     */
    public static function fromErrorResponse(ResponseInterface $response): self
    {
        return new UnknownErrorException($response->getBody()->getContents());
    }
}

<?php

/*
 * This file is part of the FnacApiClient.
 * (c) 2011 Fnac
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FnacApiClient\Exception;

use Zend\Http\Response;

/**
 * ErrorResponseException class used when we get a response error
 *
 * @author Fnac
 * @version    1.0.0
 */
class ErrorResponseException extends \ErrorException
{
  private $severityMapping = array(
    'ERROR' => E_ERROR,
    'WARNING' => E_WARNING
  );


  public function __construct(Response $response)
  {
    $content = $response->getBody();

    $oldSetting = libxml_use_internal_errors(true);
    $xml = simplexml_load_string($content);

    if (!$xml) {
        $message = sprintf("Failed to parsed xml response for content %s", $content);
        libxml_use_internal_errors($oldSetting);

        parent::__construct($message);

        return;
    }
    libxml_use_internal_errors($oldSetting);

    foreach($xml->children() as $child)
    {
      if ($child->getName() == 'error')
      {
        $message = (string) $child;
        $code = (int)substr(((string) $child['code']), 4);
        $severity = (string) $child['severity'];

        $severity = isset($this->severityMapping[$severity]) ? $this->severityMapping[$severity] : E_ERROR;

        parent::__construct($message, $code, $severity);

        break;
      }
    }
  }
}
<?php
/*
 * This file is part of the fnacMarketPlace APi Client.
 * (c) 2011 Fnac
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FnacApiClient\Entity;

use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizableInterface;

/**
 * Represent an error coming from webservice
 *
 * @author     Fnac
 * @version    1.0.0
 */
class Error extends Entity
{
    private $severity;
    private $code;
    private $message;

    /**
     * {@inheritDoc}
     */
    public function normalize(SerializerInterface $serializer, $format = null)
    {

    }

    /**
     * {@inheritDoc}
     */
    public function denormalize(SerializerInterface $serializer, $data, $format = null)
    {
        $this->severity = $data['@severity'];
        $this->code = $data['@code'];
        $this->message = $data['#'];
    }

    /**
     * Return the severity level of error
     *
     * @return string
     */
    public function getSeverity()
    {
        return $this->severity;
    }

    /**
     * Return error code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Return the message associated with the error
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }
}

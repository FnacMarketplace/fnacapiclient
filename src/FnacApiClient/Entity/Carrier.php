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
 * Represent a Carrier
 *
 * @author     Fnac
 * @version    1.0.0
 */

class Carrier extends Entity
{
    private $name;
    private $code;
    private $is_global;

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
        $this->name = $data['name'];
        $this->code = $data['@code'];
        $this->is_global = (boolean) $data['@global'];
    }

    /**
     * Return the carrier's name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Return the carrier's code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Return true if carrier was define by fnac
     *
     * @return boolean
     */
    public function isGlobal()
    {
        return $this->is_global;
    }
}

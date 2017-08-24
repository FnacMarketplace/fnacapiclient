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
 * ProductReference definition.
 *
 * @author     Fnac
 * @version    1.0.0
 */

class ProductReference extends Entity
{
    private $type;
    private $value;

    /**
     * {@inheritDoc}
     */
    public function normalize(SerializerInterface $serializer, $format = null)
    {
        return array(
            '@type' => $this->type, '#' => $this->value
        );
    }

    /**
     * {@inheritDoc}
     */
    public function denormalize(SerializerInterface $serializer, $data, $format = null)
    {
        $this->type = $data['@type'];
        $this->value = $data['#'];
    }

    /**
     * Set product reference type
     *
     * @see FnacApiClient\Type\ProductType
     *
     * @param string $type : Type of reference
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Set product reference value
     *
     * @param string $value : Value of reference
     */
    public function setValue($value)
    {
        $this->value = $value;
    }
    
    /**
     * Get product reference type
     *
     * @see FnacApiClient\Type\ProductType
     *
     * @param string $type : Type of reference
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Get product reference value
     *
     * @param string $value : Value of reference
     */
    public function getValue()
    {
        return $this->value;
    }
}

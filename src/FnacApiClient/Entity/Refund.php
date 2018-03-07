<?php
/*
 * This file is part of the fnacMarketPlace APi Client.
 * (c) 2011 Fnac
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FnacApiClient\Entity;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Refund definition.
 *
 * @author     Fnac
 * @version    1.0.0
 */

class Refund extends Entity
{
    private $product_amount;
    private $shipping_amount;
    private $fee_ht_amount;
    private $created_at;

    /**
     * {@inheritDoc}
     */
    public function normalize(NormalizerInterface $normalizer, $format = null, array $context = array())
    {

    }

    /**
     * {@inheritDoc}
     */
    public function denormalize(DenormalizerInterface $denormalizer, $data, $format = null, array $context = array())
    {
        $this->product_amount = (float) $data['product_amount'];
        $this->shipping_amount = (float) $data['shipping_amount'];
        $this->fee_ht_amount = (float) $data['fee_ht_amount'];
        $this->created_at = $data['created_at'];
    }

    /**
     * @return float
     */
    public function getProductAmount()
    {
        return $this->product_amount;
    }

    /**
     * @return float
     */
    public function getShippingAmount()
    {
        return $this->shipping_amount;
    }

    /**
     * @return float
     */
    public function getFeeHtAmount()
    {
        return $this->fee_ht_amount;
    }

    /**
     * @return date
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }
}

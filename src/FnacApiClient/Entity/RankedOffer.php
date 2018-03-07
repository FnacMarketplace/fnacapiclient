<?php
/*
 * This file is part of the fnacMarketPlace API Client.
 * (c) 2017 Fnac
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FnacApiClient\Entity;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * RankedOffer definition.
 *
 * @author     Fnac
 * @version    1.0.0
 */

class RankedOffer extends Entity
{
    private $seller_name;
    private $type;
    private $seller_url;
    private $seller_sales_number;
    private $seller_reliability_rate;
    private $seller_expedition_country;
    private $has_buy_box;
    private $offer_status;
    private $position;
    private $price;
    private $shipping_price;
    private $updated_at;

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
        $this->seller_name = $data['seller_name'];
        $this->type = $data['@type'];
        $this->seller_url = $data['seller_url'];
        $this->seller_sales_number = $data['seller_sales_number'];
        $this->seller_reliability_rate = $data['seller_reliability_rate'];
        $this->seller_expedition_country = $data['seller_expedition_country'];
        $this->seller_expedition_country = $data['seller_expedition_country'];
        $this->has_buy_box = $data['has_buy_box'];
        $this->offer_status = $data['offer_status'];
        $this->position = $data['position'];
        $this->price = $data['price'];
        $this->shipping_price = $data['shipping_price'];
        $this->updated_at = $data['updated_at'];
    }

    /**
     * Seller name
     *
     * @return string
     */
    public function getSellerName()
    {
        return $this->seller_name;
    }

    /**
     * Product seller type
     *
     * @see FnacApiClient\Type\SellerType
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Seller site url
     *
     * @return string
     */
    public function getSellerUrl()
    {
        return $this->seller_url;
    }

    /**
     * Seller's number of sales
     *
     * @return int
     */
    public function getSellerSalesNumber()
    {
        return $this->seller_sales_number;
    }

    /**
     * Seller's reliability score (out of 5)
     *
     * @return float
     */
    public function getSellerReliabilityRate()
    {
        return $this->seller_reliability_rate;
    }

    /**
     * Country from where seller ships orders
     *
     * @return string
     */
    public function getSellerExpeditionCountry()
    {
        return $this->seller_expedition_country;
    }

    /**
     * Seller is appearing in Buy box
     *
     * @return boolean
     */
    public function getHasBuyBox()
    {
        return $this->has_buy_box;
    }

    /**
     * Product state type for this pricing
     *
     * @see FnacApiClient\Type\ProductStateType
     *
     * @return integer
     */
    public function getOfferStatus()
    {
        return $this->offer_status;
    }

    /**
     * Offer ranking position
     *
     * @return integer
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Offer price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Shipping price to related offer
     *
     * @return float
     */
    public function getShippingPrice()
    {
        return $this->shipping_price;
    }

    /**
     * Last update date
     *
     * @return datetime
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
}

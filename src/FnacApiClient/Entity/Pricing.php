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
 * Pricing definition.
 *
 * @author     Fnac
 * @version    1.0.0
 */

class Pricing extends Entity
{
    private $seller;
    private $price;
    private $shipping_price;
    private $offer_status;
    private $seller_url;
    private $type;
    private $evaluation;
    private $nb_orders;

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
        $this->seller = isset($data['seller']) ? $data['seller'] : "";
        $this->price = $data['price'];
        $this->shipping_price = $data['shipping_price'];
        $this->offer_status = $data['offer_status'];
        $this->seller_url = isset($data['seller_url']) ? $data['seller_url'] : "";
        $this->type = $data['@type'];
        $this->evaluation = isset($data['evaluation']) ? $data['evaluation'] : "";
        $this->nb_orders = isset($data['nb_orders']) ? $data['nb_orders'] : "";
    }

    /**
     * Product seller name
     *
     * @return string
     */
    public function getSeller()
    {
        return $this->seller;
    }

    /**
     * Product price for this pricing
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Product shipping price for this pricing
     *
     * @return float
     */
    public function getShippingPrice()
    {
        return $this->shipping_price;
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
     * Seller site url
     *
     * @return string
     */
    public function getSellerUrl()
    {
        return $this->seller_url;
    }

    /**
     * Number of evaluations
     *
     * @return int
     */
    public function getEvaluation()
    {
        return $this->evaluation;
    }

    /**
     * Number of orders
     *
     * @return int
     */
    public function getNbOrder()
    {
        return $this->nb_orders;
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
}

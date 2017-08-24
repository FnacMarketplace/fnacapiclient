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

use FnacApiClient\Entity\RankedOffer;

/**
 * Pricing definition.
 *
 * @author     Fnac
 * @version    1.0.0
 */

class StandardPricing extends Entity
{
    private $seller_offer_price;
    private $seller_offer_shipping_price;
    private $ranked_offers;

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
        $this->seller_offer_price = isset($data['seller_offer']['price']) ? $data['seller_offer']['price'] : "";
        $this->seller_offer_shipping_price = isset($data['seller_offer']['shipping_price']) ? $data['seller_offer']['shipping_price'] : "";
        
        $this->ranked_offers = new \ArrayObject();
        
        if (isset($data['ranked_offers'][0])) {
            foreach ($data['ranked_offers'] as $ranked_offer) {
                $tmpObj = new RankedOffer();
                $tmpObj->denormalize($serializer, $ranked_offer, $format);
                $this->ranked_offers[] = $tmpObj;
            }
        } elseif (!empty($data['ranked_offers'])) {
            $tmpObj = new RankedOffer();
            $tmpObj->denormalize($serializer, $data['ranked_offers'], $format);
            $this->ranked_offers[] = $tmpObj;
        }
    }

    /**
     * Seller own offer price
     *
     * @return string
     */
    public function getSellerOfferPrice()
    {
        return $this->seller_offer_price;
    }

    /**
     * Seller own offer related shipping cost
     *
     * @return float
     */
    public function getSellerOfferShippingPrice()
    {
        return $this->seller_offer_shipping_price;
    }
    
    public function getRankedOffers()
    {
        return $this->ranked_offers;
    }

}

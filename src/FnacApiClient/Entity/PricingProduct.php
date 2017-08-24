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
 * PricingProduct definition.
 *
 * @author     Fnac
 * @version    1.0.0
 */

class PricingProduct extends Entity
{
    private $product_reference;
    private $product_name;
    private $image_url;
    private $pricings;
    private $offer_status;

    private $seller_price;
    private $seller_shipping;
    private $seller_offer_sku;
    private $seller_offer_state;
    private $seller_adherent_price;
    private $seller_adherent_shipping;
    private $seller_adherent_offer_state;
    private $seller_adherent_offer_sku;
    private $new_price;
    private $new_shipping;
    private $refurbished_price;
    private $refurbished_shipping;
    private $used_price;
    private $used_shipping;
    private $new_adherent_price;
    private $new_adherent_shipping;
    private $refurbished_adherent_price;
    private $refurbished_adherent_shipping;
    private $used_adherent_price;
    private $used_adherent_shipping;
    
    private $product_ean;
    private $standard_pricing;
    private $adherent_pricing;

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
        $this->product_reference = new ProductReference();
        $this->product_reference->denormalize($serializer, $data['product_reference'], $format);
        
        // using Fnac Marketplace pricing service V1
        if (isset($data['pricing'])) {

            $this->product_name = $data['product_name'];
            $this->image_url = $data['image_url'];

            $this->pricings = new \ArrayObject();
        
            if (isset($data['pricing'][0])) {
                foreach ($data['pricing'] as $pricing) {
                    $tmpObj = new Pricing();
                    $tmpObj->denormalize($serializer, $pricing, $format);
                    $this->pricings[] = $tmpObj;
                }
            } elseif (!empty($data['pricing'])) {
                $tmpObj = new Pricing();
                $tmpObj->denormalize($serializer, $data['pricing'], $format);
                $this->pricings[] = $tmpObj;
            }

        }
        // using Fnac Marketplace pricing service V3 - PricesQuery service
        elseif(isset($data['standard'])) {
            $this->product_ean = isset($data['product_ean']) ? $data['product_ean'] : "";
            $this->product_name = $data['product_name'];
            $this->image_url = $data['product_url'];

            $tmpObj = new StandardPricing();
            $tmpObj->denormalize($serializer, $data['standard'], $format);
            $this->standard_pricing = $tmpObj;

            $tmpObj = new AdherentPricing();
            $tmpObj->denormalize($serializer, $data['adherent'], $format);
            $this->adherent_pricing = $tmpObj;
        }
        // using Fnac Marketplace pricing service V2
        else
        {
            $this->seller_price = isset($data['seller_price']) ? $data['seller_price'] : "";
            $this->seller_shipping = isset($data['seller_shipping']) ? $data['seller_shipping'] : "";
            $this->seller_offer_sku = isset($data['seller_offer_sku']) ? $data['seller_offer_sku'] : "";
            $this->seller_offer_state = isset($data['seller_offer_state']) ? $data['seller_offer_state'] : "";
            $this->seller_adherent_price = isset($data['seller_adherent_price']) ? $data['seller_adherent_price'] : "";
            $this->seller_adherent_shipping = isset($data['seller_adherent_shipping']) ? $data['seller_adherent_shipping'] : "";
            $this->seller_adherent_offer_state = isset($data['seller_adherent_offer_state']) ? $data['seller_adherent_offer_state'] : "";
            $this->seller_adherent_offer_sku = isset($data['seller_adherent_offer_sku']) ? $data['seller_adherent_offer_sku'] : "";
            $this->new_price = isset($data['new_price']) ? $data['new_price'] : "";
            $this->new_shipping = isset($data['new_shipping']) ? $data['new_shipping'] : "";
            $this->refurbished_price = isset($data['refurbished_price']) ? $data['refurbished_price'] : "";
            $this->refurbished_shipping = isset($data['refurbished_shipping']) ? $data['refurbished_shipping'] : "";
            $this->used_price = isset($data['used_price']) ? $data['used_price'] : "";
            $this->used_shipping = isset($data['used_shipping']) ? $data['used_shipping'] : "";
            $this->new_adherent_price = isset($data['new_adherent_price']) ? $data['new_adherent_price'] : "";
            $this->new_adherent_shipping = isset($data['new_adherent_shipping']) ? $data['new_adherent_shipping'] : "";
            $this->refurbished_adherent_price = isset($data['refurbished_adherent_price']) ? $data['refurbished_adherent_price'] : "";
            $this->refurbished_adherent_shipping = isset($data['refurbished_adherent_shipping']) ? $data['refurbished_adherent_shipping'] : "";
            $this->used_adherent_price = isset($data['used_adherent_price']) ? $data['used_adherent_price'] : "";
            $this->used_adherent_shipping = isset($data['used_adherent_shipping']) ? $data['used_adherent_shipping'] : "";
        }
    }

    /**
     * Pricing product reference type (ie: EAN, ISBN)
     *
     * @see ProductReference
     *
     * @return string
     */
    public function getProductReferenceType()
    {
        return $this->product_reference->getType();
    }
    
    /**
     * Pricing product reference value
     *
     * @see ProductReference
     *
     * @return string
     */
    public function getProductReference()
    {
        return $this->product_reference->getValue();
    }

    /**
     * Product's name
     *
     * @return string
     */
    public function getProductName()
    {
        return $this->product_name;
    }

    /**
     * Product image url
     *
     * @return string
     */
    public function getImageUrl()
    {
        return $this->image_url;
    }
    
    /**
     * Returns product state
     *
     * @return int
     */
    public function getOfferStatus()
    {
        return $this->offer_status;
    }
    
    /**
     * Product pricing list
     *
     * @see Pricing
     *
     * @return ArrayObject<Pricing> The list of pricing for this product
     */
    public function getPricings()
    {
        return $this->pricings;
    }

    /**
     * Seller's own offer price
     *
     * @return float
     */
    public function getSellerPrice() {
        return $this->seller_price;
    }


    /**
     * Seller's own offer shipping cost
     *
     * @return float
     */
    public function getSellerShipping() {
        return $this->seller_shipping;
    }


    /**
     * Seller's own offer SKU
     *
     * @return float
     */
    public function getSellerOfferSku() {
        return $this->seller_offer_sku;
    }


    /**
     * Seller's own offer product state
     *
     * @return float
     */
    public function getSellerOfferState() {
        return $this->seller_offer_state;
    }


    /**
     * Seller's own offer adherent price
     *
     * @return float
     */
    public function getSellerAdherentPrice() {
        return $this->seller_adherent_price;
    }


    /**
     * Seller's own offer adherent shipping cost
     *
     * @return float
     */
    public function getSellerAdherentShipping() {
        return $this->seller_adherent_shipping;
    }


    /**
     * Seller's own offer adherent product state
     *
     * @return float
     */
    public function getSellerAdherentOfferState() {
        return $this->seller_adherent_offer_state;
    }


    /**
     * Seller's own offer sku for adherent
     *
     * @return float
     */
    public function getSellerAdherentOfferSku() {
        return $this->seller_adherent_offer_sku;
    }


    /**
     * Best price for the product, in new state
     *
     * @return float
     */
    public function getNewPrice() {
        return $this->new_price;
    }


    /**
     * Shipping costs related to best new product price
     *
     * @return float
     */
    public function getNewShipping() {
        return $this->new_shipping;
    }


    /**
     * Best price for the product, in refurbished state
     *
     * @return float
     */
    public function getRefurbishedPrice() {
        return $this->refurbished_price;
    }


    /**
     * Shipping costs related to best refurbished product price
     *
     * @return float
     */
    public function getRefurbishedShipping() {
        return $this->refurbished_shipping;
    }


    /**
     * Best price for the product, in used state
     *
     * @return float
     */
    public function getUsedPrice() {
        return $this->used_price;
    }


    /**
     * Shipping costs related to best used product price
     *
     * @return float
     */
    public function getUsedShipping() {
        return $this->used_shipping;
    }


    /**
     * Best adherent price for the product, in new state
     *
     * @return float
     */
    public function getNewAdherentPrice() {
        return $this->new_adherent_price;
    }


    /**
     * Shipping costs related to best new product adherent price
     *
     * @return float
     */
    public function getNewAdherentShipping() {
        return $this->new_adherent_shipping;
    }


    /**
     * Best adherent price for the product, in refurbished state
     *
     * @return float
     */
    public function getRefurbishedAdherentPrice() {
        return $this->refurbished_adherent_price;
    }


    /**
     * Shipping costs related to best refurbished product adherent price
     *
     * @return float
     */
    public function getRefurbishedAdherentShipping() {
        return $this->refurbished_adherent_shipping;
    }


    /**
     * Best adherent price for the product, in used state
     *
     * @return float
     */
    public function getUsedAdherentPrice() {
        return $this->used_adherent_price;
    }


    /**
     * Shipping costs related to best used product adherent price
     *
     * @return float
     */
    public function getUsedAdherentShipping() {
        return $this->used_adherent_shipping;
    }

    /**
     * Product's EAN
     * 
     * @return string
     */
    public function getProductEan() {
        return $this->product_ean;
    }

    /**
     * Get competitors standard prices (non Fnac members prices)
     * 
     * @return array
     */
    public function getStandardPricing() {
        return $this->standard_pricing;
    }

    /**
     * Get competitors "adherent" prices (Fnac members prices)
     * 
     * @return array
     */
    public function getAdherentPricing() {
        return $this->adherent_pricing;
    }
}

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

use FnacApiClient\Type\ProductType;

/**
 * Offer definition.
 *
 * @author     Fnac
 * @version    1.0.0
 */

class Offer extends Entity
{
    /** Send variable **/
    private $product_reference;
    private $product_reference_type;
    private $offer_reference;
    private $offer_reference_type;
    private $treatment;

    /** Get Variable **/
    private $product_name;
    private $product_fnac_id;
    private $offer_fnac_id;
    private $offer_seller_id;
    private $product_url;
    private $image;
    private $nb_messages;
    private $fee_excluding_taxes;
    private $fee_including_all_taxes;

    /** Both **/
    private $product_state;
    private $price;    
    private $adherent_price;
    private $quantity;
    private $description;
    private $internal_comment;
    private $showcase;
    private $promotion;

    const STATE_NEW             = 11;    
    const STATE_USED_AS_NEW     = 1;
    const STATE_USED_VERY_GOOD  = 2;
    const STATE_USED_GOOD       = 3;
    const STATE_USED_CORRECT    = 4;
    const STATE_REFURBISHED     = 10;

    public static $product_state_names = array(
        self::STATE_NEW             => "New",
        self::STATE_USED_AS_NEW     => "Used, as new",
        self::STATE_USED_VERY_GOOD  => "Used, very good state",
        self::STATE_USED_GOOD       => "Used, good state",
        self::STATE_USED_CORRECT    => "Used, correct state",
        self::STATE_REFURBISHED     => "Refurbished"
    );
    
    /**
     * {@inheritDoc}
     */
    public function normalize(SerializerInterface $serializer, $format = null)
    {
        $data = array();

        if (!is_null($this->product_reference)) {
            $data['product_reference'] = array(
                '@type' => $this->product_reference_type, '#' => $this->product_reference
            );
        }

        if (!is_null($this->offer_reference)) {
            $data['offer_reference'] = array(
                '@type' => $this->offer_reference_type, '#' => $this->offer_reference
            );
        }

        if (!is_null($this->price)) {
            $data['price'] = $this->price;
        }
        
        if (!is_null($this->adherent_price)) {
            $data['adherent_price'] = $this->adherent_price;
        }

        if (!is_null($this->product_state)) {
            $data['product_state'] = $this->product_state;
        }

        if (!is_null($this->quantity)) {
            $data['quantity'] = $this->quantity;
        }

        if (!is_null($this->description)) {
            $data['description'] = $this->description;
        }

        if (!is_null($this->internal_comment)) {
            $data['internal_comment'] = $this->internal_comment;
        }

        if (!is_null($this->showcase)) {
            $data['showcase'] = $this->showcase;
        }

        if (!is_null($this->treatment)) {
            $data['treatment'] = $this->treatment;
        }

        if (!is_null($this->promotion)) {
            $data['promotion'] = $this->promotion;
        }
        
        return $data;
    }

    /**
     * {@inheritDoc}
     */
    public function denormalize(SerializerInterface $serializer, $data, $format = null)
    {
        $this->product_name = $data['product_name'];
        $this->product_fnac_id = $data['product_fnac_id'];
        $this->offer_fnac_id = $data['offer_fnac_id'];
        $this->offer_seller_id = $data['offer_seller_id'];
        $this->product_state = (int) $data['product_state'];
        $this->price = (float) $data['price'];
        if(isset($data['adherent_price']))
        {
          $this->adherent_price = (float) $data['adherent_price'];          
        }
        $this->quantity = (int) $data['quantity'];
        $this->description = $data['description'];
        $this->internal_comment = $data['internal_comment'];
        $this->product_url = $data['product_url'];
        $this->image = $data['image'];
        $this->nb_messages = $data['nb_messages'];
        $this->showcase = (integer) $data['showcase'];

        $this->offer_reference = $this->offer_fnac_id;
        $this->offer_reference_type = ProductType::ITEM_ID;
        
        if(isset($data['fee_excluding_taxes']))
        {
            $this->fee_excluding_taxes = (float) $data['fee_excluding_taxes'];
        }
        
        if(isset($data['fee_including_all_taxes']))
        {
            $this->fee_including_all_taxes = (float) $data['fee_including_all_taxes'];
        }

        if(isset($data['promotion']))
        {
            $tmpObj = new Promotion();
            $tmpObj->denormalize($serializer, $data['promotion'], $format);
            $this->promotion = $tmpObj;
        }
    }

    /**
     * Set product's reference type
     *
     * @see FnacApiClient\Type\ProductType
     *
     * @param string $product_reference_type : Type of product reference
     */
    public function setProductReferenceType($product_reference_type)
    {
        $this->product_reference_type = $product_reference_type;
    }

    /**
     * Set product's reference value depending on type
     *
     * @param string $product_reference : Reference of product to set
     */
    public function setProductReference($product_reference)
    {
        $this->product_reference = $product_reference;
    }

    /**
     * Set offer's reference type
     *
     * @see FnacApiClient\Type\OfferReferenceType
     *
     * @param string $offer_reference_type : Type of offer reference
     */
    public function setOfferReferenceType($offer_reference_type)
    {
        $this->offer_reference_type = $offer_reference_type;
    }

    /**
     * Set offer's reference value depending on type
     *
     * @param string $offer_reference : Offer reference to update
     */
    public function setOfferReference($offer_reference)
    {
        $this->offer_reference = $offer_reference;
    }

    /**
     * Set offer's price
     *
     * @param float $price : Price to set for this offer
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }
    
    /**
     * Set offer's "adherent" price
     *
     * @param float $adherent_price : Adherent price to set for this offer. This price can be set only by eligible sellers
     */
    public function setAdherentPrice($adherent_price)
    {
        $this->adherent_price = $adherent_price;
    }

    /**
     * Set product's state of offer : Only when adding an offer
     *
     * @param string $product_state Product state to se for this offer
     */
    public function setProductState($product_state)
    {
        $this->product_state = $product_state;
    }

    /**
     * Set offer's quantity
     *
     * @param integer $quantity Quantity to set
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * Set product's description
     *
     * @param string $description Description of offer
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Set offer's internal comment for personal use
     *
     * @param string $internal_comment A personal comment for this offer
     */
    public function setInternalComment($internal_comment)
    {
        $this->internal_comment = $internal_comment;
    }

    /**
     * Set offer's position in shop's showcase
     *
     * @param unsigned integer $showcase Offer's position in shop's showcase
     */
    public function setShowcase($showcase)
    {
        $this->showcase = $showcase;
    }

    /**
     * Set treatment to do on offer
     *
     * @see FnacApiClient\Type\OfferTreatmentType
     *
     * @param string $treatment
     */
    public function setTreatment($treatment)
    {
        $this->treatment = $treatment;
    }

    /**
     * Set promotion to on offer
     *
     * @param Promotion $promotion
     */
    public function setPromotion($promotion)
    {
        $this->promotion = $promotion;
    }

    /**
     * Name, category and a short description of product if available
     *
     * @return string
     */
    public function getProductName()
    {
        return $this->product_name;
    }

    /**
     * Product unique identifier from fnac
     *
     * @return string
     */
    public function getProductFnacId()
    {
        return $this->product_fnac_id;
    }

    /**
     * Offer's unique identifier from fnac
     *
     * @return string
     */
    public function getOfferFnacId()
    {
        return $this->offer_fnac_id;
    }

    /**
     * Offer's unique identifier from seller
     *
     * @return string
     */
    public function getOfferSellerId()
    {
        return $this->offer_seller_id;
    }

    /**
     * Product url on fnac.com
     *
     * @return string
     */
    public function getProductUrl()
    {
        return $this->product_url;
    }

    /**
     * Product image url on fnac.com
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Number of messages related to this offer
     *
     * @return integer
     */
    public function getNbMessages()
    {
        return $this->nb_messages;
    }

    /**
     * Product state in this offer
     *
     * @see FnacApiClient\Type\ProductStateType
     *
     * @return integer
     */
    public function getProductState()
    {
        return $this->product_state;
    }

    /**
     * Product state label
     *
     * @see FnacApiClient\Type\ProductStateType
     *
     * @return string
     */
    public function getProductStateLabel()
    {
        return self::$product_state_names[$this->product_state];
    }
    
    /**
     * Product price for this offer
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Product adherent price for this offer
     *
     * @return float
     */
    public function getAdherentPrice()
    {
        return $this->adherent_price;
    }
    
    /**
     * Product's quantity in offer
     *
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Product's description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Offer's internal comment for personal use only
     *
     * @return string
     */
    public function getInternalComment()
    {
        return $this->internal_comment;
    }

    /**
     * Offer's position in shop's showcase
     *
     * @return integer
     */
    public function getShowcase()
    {
        return $this->showcase;
    }

    /**
     * Offer's withdrawn fee amount excluding taxes
     *
     * @return integer
     */
    public function getFeeExcludingTaxes()
    {
        return $this->fee_excluding_taxes;
    }

    /**
     * Offer's withdrawn fee amount including taxes
     *
     * @return integer
     */
    public function getFeeIncludingAllTaxes()
    {
        return $this->fee_including_all_taxes;
    }
}

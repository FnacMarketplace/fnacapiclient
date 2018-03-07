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
 * OrderDetail definition.
 *
 * @author     Fnac
 * @version    1.0.0
 */

class OrderDetail extends Entity
{
    /** Send Var **/
    private $action = null;
    private $tracking_company = null;

    /** Get Var **/
    private $product_name = null;
    private $state = null;
    private $quantity = null;
    private $price = null;
    private $fees = null;
    private $product_fnac_id = null;
    private $offer_fnac_id = null;
    private $offer_seller_id = null;
    private $product_state = null;
    private $description = null;
    private $internal_comment = null;
    private $shipping_price = null;
    private $shipping_method = null;
    private $created_at = null;
    private $debited_at = null;
    private $received_at = null;
    private $product_url = null;
    private $image = null;

    /** Both **/
    private $order_detail_id;
    private $tracking_number;

    /**
     * {@inheritDoc}
     */
    public function normalize(NormalizerInterface $normalizer, $format = null, array $context = array())
    {
        $data = array(
            'action' => $this->action
        );
        
        if (!is_null($this->order_detail_id)) {
            $data['order_detail_id'] = $this->order_detail_id;
        }

        if (!is_null($this->tracking_number) && !empty($this->tracking_number)) {
            $data['tracking_number'] = $this->tracking_number;
        }

        if (!is_null($this->tracking_company)) {
            $data['tracking_company'] = $this->tracking_company;
        }

        return $data;
    }

    /**
     * {@inheritDoc}
     */
    public function denormalize(DenormalizerInterface $denormalizer, $data, $format = null, array $context = array())
    {
        $this->product_name = $data['product_name'];
        $this->state = $data['state'];
        $this->quantity = $data['quantity'];
        $this->price = $data['price'];
        $this->fees = $data['fees'];
        $this->product_fnac_id = $data['product_fnac_id'];
        $this->offer_fnac_id = $data['offer_fnac_id'];
        $this->offer_seller_id = $data['offer_seller_id'];
        $this->product_state = $data['product_state'];
        $this->description = $data['description'];
        $this->internal_comment = $data['internal_comment'];
        $this->shipping_price = $data['shipping_price'];
        $this->shipping_method = $data['shipping_method'];
        $this->created_at = $data['created_at'];
        $this->debited_at = isset($data['debited_at']) ? $data['debited_at'] : null;
        $this->received_at = isset($data['received_at']) ? $data['received_at'] : null;
        $this->product_url = $data['product_url'];
        $this->image = isset($data['image']) ? $data['image'] : null;
        $this->tracking_number = $data['tracking_number'];
        $this->order_detail_id = $data['order_detail_id'];
    }

    /**
     * Product's name, category and short description if available
     *
     * @return string
     */
    public function getProductName()
    {
        return $this->product_name;
    }

    /**
     * Order detail state
     *
     * @see FnacApiClient\Type\OrderDetailStateType
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Product's unique identifier from fnac
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
     * Offer's unique identitifer from seller
     *
     * @return string
     */
    public function getOfferSellerId()
    {
        return $this->offer_seller_id;
    }

    /**
     * Product's url on fnac.com
     *
     * @return string
     */
    public function getProductUrl()
    {
        return $this->product_url;
    }

    /**
     * Product's image url on fnac.com
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Product's state
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
        return Offer::$product_state_names[$this->product_state];
    }

    /**
     * Product's price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Order detail fees with all tax (equal to 0 until order has been accepted)
     *
     * @return float
     */
    public function getFees()
    {
        return $this->fees;
    }

    /**
     * Product's quantity ordered
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
     * Order detail internal comment for personal use
     *
     * @return string
     */
    public function getInternalComment()
    {
        return $this->internal_comment;
    }

    /**
     * Order detail unique identifier from fnac
     *
     * @return string
     */
    public function getOrderDetailId()
    {
        return $this->order_detail_id;
    }

    /**
     * Shipping price with all tax for all product : Quantity * Unit product shipping price
     *
     * @return float
     */
    public function getShippingPrice()
    {
        return $this->shipping_price;
    }

    /**
     * Shipping method
     *
     * @return string
     */
    public function getShippingMethod()
    {
        return $this->shipping_method;
    }

    /**
     * Creation date of order detail
     *
     * @return date
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Debited date of order detail
     *
     * @return date
     */
    public function getDebitedAt()
    {
        return $this->debited_at;
    }

    /**
     * Received date of order detail
     *
     * @return date
     */
    public function getReceivedAt()
    {
        return $this->received_at;
    }

    /**
     * Order detail tracking number
     *
     * @return string
     */
    public function getTrackingNumber()
    {
        return $this->tracking_number;
    }

    /**
     * Set the order detail unique identifier
     *
     * @param string $order_detail_id : Order detail uid
     */
    public function setOrderDetailId($order_detail_id)
    {
        $this->order_detail_id = $order_detail_id;
    }

    /**
     * Set the specific action to do on this order detail depdending on order action group
     *
     * @see FnacApiClient\Type\OrderDetailActionType
     *
     * @param string $action : Action to do on this order detail
     */
    public function setAction($action)
    {
        $this->action = $action;
    }

    /**
     * Set order detail tracking number
     *
     * @param string $tracking_number : Tracking number
     */
    public function setTrackingNumber($tracking_number)
    {
        $this->tracking_number = $tracking_number;
    }

    /**
     * Set order detail tracking company
     *
     * @param string $tracking_company : Tracking company
     */
    public function setTrackingCompany($tracking_company)
    {
        $this->tracking_company = $tracking_company;
    }
}

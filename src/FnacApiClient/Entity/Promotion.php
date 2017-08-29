<?php
/*
 * This file is part of the fnacMarketPlace APi Client.
 * (c) 2017 Fnac
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FnacApiClient\Entity;

use Symfony\Component\Serializer\SerializerInterface;

/**
 * Promotion definition.
 *
 * @author     Fnac
 * @version    1.0.0
 */

class Promotion extends Entity
{
    /** Send Var **/

    /** Get Var **/

    /** Both **/
    private $promotion_type;
    private $promotion_uid;
    private $starts_at;
    private $ends_at;
    private $discount_type;
    private $discount_value;
    private $triggers;
    private $trigger_cart_type;
    private $trigger_cart;
    private $trigger_promotion_code;
    private $trigger_customer_type;

    /**
     * {@inheritDoc}
     */
    public function normalize(SerializerInterface $serializer, $format = null)
    {
        $data['@type'] = $this->promotion_type;
        
        if(!is_null($this->sales_period_reference)) {
            $data['sales_period_reference'] = $this->sales_period_reference;
        }
        
        if(!is_null($this->promotion_uid)) {
             $data['promotion_uid'] = $this->promotion_uid;
        }

        $data['starts_at'] = $this->starts_at;
        $data['ends_at'] = $this->ends_at;
        
        if (!is_null($this->discount_type)) {
            $data['discount_type'] = $this->discount_type;
        }
        
        if (!is_null($this->discount_value)) {
            $data['discount_value'] = $this->discount_value;
        }

        if(!is_null($this->trigger_cart)) {
            
            $data['triggers'] = array();
            
            $data['triggers']['trigger_cart'] = array(
                '@type' => $this->trigger_cart_type, '#' => $this->trigger_cart
             );
            
            if($this->trigger_promotion_code) {
                $data['triggers']['trigger_promotion_code'] = $this->trigger_promotion_code;
            }
            
            if($this->trigger_customer_type) {
                $data['triggers']['trigger_customer_type'] = $this->trigger_customer_type;
            }
        }
        
        return $data;
    }

    /**
     * {@inheritDoc}
     */
    public function denormalize(SerializerInterface $serializer, $data, $format = null)
    {
        $this->promotion_type = $data['@type'];
        $this->promotion_uid = $data['promotion_uid'];
        $this->start_at = $data['start_at'];
        $this->ends_at = $data['ends_at'];
        $this->discount_type = $data['discount_type'];
        $this->discount_value = $data['discount_value'];
        $this->trigger_cart_type = $data['triggers']['trigger_cart']['@type'];
        $this->trigger_cart = $data['triggers']['trigger_cart']['#'];
        $this->trigger_promotion_code = $data['triggers']['trigger_promotion_code'];
        $this->trigger_customer_type = $data['triggers']['trigger_customer_type'];
    }

    /**
     * Promotion type
     *
     * @return string
     */
    public function getPromotionType()
    {
        return $this->promotion_type;
    }

    /**
     * Promotion unique id
     *
     * @return string
     */
    public function getPromotionUid()
    {
        return $this->promotion_uid;
    }

    /**
     * Promotion start date
     *
     * @return string
     */
    public function getStartsAt()
    {
        return $this->starts_at;
    }

    /**
     * Promotion end date
     *
     * @return string
     */
    public function getEndsAt()
    {
        return $this->ends_at;
    }

    /**
     * Discount type
     *
     * @return string
     */
    public function getDiscountType()
    {
        return $this->discount_type;
    }

    /**
     * Discount value
     *
     * @return string
     */
    public function getDiscountValue()
    {
        return $this->discount_value;
    }

    /**
     * Promotion triggers settings
     *
     * @return string
     */
    public function getTriggers()
    {
        return $this->triggers;
    }

    /**
     * Set promotion type
     *
     * @param string promotion_type : promotion type
     */
    public function setPromotionType($promotion_type)
    {
        $this->promotion_type = $promotion_type;
    }

    /**
     * Set the promotion unique id
     *
     * @param string promotion_uid: promotion unique id
     */
    public function setPromotionUid($promotion_uid)
    {
        $this->promotion_uid = $promotion_uid;
    }

    /**
     * Set promotion starting date
     *
     * @param string starts_at: start date
     */
    public function setStartsAt($starts_at)
    {
        $this->starts_at = $starts_at;
    }

    /**
     * Set promotion ending date
     *
     * @param string ends_at: end date
     */
    public function setEndsAt($ends_at)
    {
        $this->ends_at = $ends_at;
    }

     
    public function setDiscountType($discount_type)
    {
        $this->discount_type = $discount_type;
    }

    public function setDiscountValue($discount_value)
    {
        $this->discount_value = $discount_value;
    }
    
    /**
     * Trigger cart type
     *
     * @return string
     */
    public function getTriggerCartType()
    {
        return $this->trigger_cart_type;
    }

    /**
     * Trigger cart value
     *
     * @return string
     */
    public function getTriggerCart()
    {
        return $this->trigger_cart;
    }

    /**
     * Trigger Promotion code
     *
     * @return string
     */
    public function getTriggerPromotionCode()
    {
        return $this->trigger_promotion_code;
    }

    /**
     * Customer Cart trigger
     *
     * @return string
     */
    public function getTriggerCustomerType()
    {
        return $this->trigger_customer_type;
    }

    /**
     * Set Trigger cart type
     *
     * @param string trigger_cart_type: trigger cart type
     */
    public function setTriggerCartType($trigger_cart_type)
    {
        $this->trigger_cart_type = $trigger_cart_type;
    }

    /**
     * Set Trigger cart value
     *
     * @param string trigger_cart: value used to trigger promotion
     */
    public function setTriggerCart($trigger_cart)
    {
        $this->trigger_cart = $trigger_cart;
    }

    /**
     * Set trigger promotion code
     *
     * @param string trigger_promotion_code: promotion code
     */
    public function setTriggerPromotionCode($trigger_promotion_code)
    {
        $this->trigger_promotion_code = $trigger_promotion_code;
    }

    /**
     * Set trigger customer type
     *
     * @param string trigger_promotion_code: promotion code
     */
    public function setTriggerCustomerType($trigger_customer_type)
    {
        $this->trigger_customer_type = $trigger_customer_type;
    }

    /**
     * Set promotion triggers settings
     *
     * @return string
     */
    public function setTriggers($triggers)
    {
        $this->triggers = $triggers;
    }
    
}

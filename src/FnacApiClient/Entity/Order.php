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
 * Order definition.
 *
 * @author     Fnac
 * @version    1.0.0
 */

class Order extends Entity
{
    private $order_id;
    private $order_action;
    private $orders_detail;

    private $shop_id;
    private $client_id;
    private $client_firstname;
    private $client_lastname;
    private $client_email;
    private $state;
    private $created_at;
    private $accepted_at;
    private $fees;
    private $nb_messages;
    private $delivery_note;
    private $shipping_address;
    private $billing_address;
    private $adherent_number;
    private $order_culture;

    /**
     * {@inheritdoc}
     */
    public function __construct()
    {
        $this->orders_detail = new \ArrayObject();
    }

    /**
     * Set order's unique identifier
     *
     * @param string $order_id : Order uid
     */
    public function setOrderId($order_id)
    {
        $this->order_id = $order_id;
    }

    /**
     * Order's unique identifier
     *
     * @return string
     */
    public function getOrderId()
    {
        return $this->order_id;
    }

    /**
     * Set Group action type for order detail action
     *
     * @see FnacApiClient\Type\OrderActionType
     *
     * @param string $order_action : Action to do on this order
     */
    public function setOrderAction($order_action)
    {
        $this->order_action = $order_action;
    }

    /**
     * Add order detail to this order
     *
     * @param $order_detail OrderDetail Order detail to add
     */
    public function addOrderDetail(OrderDetail $order_detail)
    {
        $this->orders_detail[] = $order_detail;
    }

    /**
     * Get list of orders detail
     *
     * @return ArrayObject<OrderDetail>
     */
    public function getOrdersDetail()
    {
        return $this->orders_detail;
    }

    /**
     * Removing all order detail when you want to make a massive update
     */
    public function clearOrdersDetail()
    {
        $this->orders_detail = new \ArrayObject();
    }

    /**
     * {@inheritDoc}
     */
    public function normalize(NormalizerInterface $normalizer, $format = null, array $context = array())
    {
        $data = array(
            '@order_id' => $this->order_id, '@action' => $this->order_action
        );
        if ($this->orders_detail->count() > 0) {
            if ($this->orders_detail->count() > 1) {
                $data['order_detail'] = array();
                foreach ($this->orders_detail as $order_detail) {
                    $data['order_detail'][] = $order_detail->normalize($normalizer, $format);
                }
            } else {
                $data['order_detail'] = $this->orders_detail[0]->normalize($normalizer, $format);
            }
        }
        return $data;
    }

    /**
     * {@inheritDoc}
     */
    public function denormalize(DenormalizerInterface $denormalizer, $data, $format = null, array $context = array())
    {
        $this->shop_id = $data['shop_id'];
        $this->client_id = $data['client_id'];
        $this->client_firstname = $data['client_firstname'];
        $this->client_lastname = $data['client_lastname'];
        $this->client_email = isset($data['client_email']) ? $data['client_email'] : "";
        $this->state = $data['state'];
        $this->order_id = $data['order_id'];
        $this->created_at = $data['created_at'];
        //$this->created_at = $data['accepted_at'];
        $this->fees = (float) $data['fees'];
        $this->nb_messages = (integer) $data['nb_messages'];
        $this->delivery_note = isset($data['delivery_note']) ? $data['delivery_note'] : "";
        $this->shipping_address = new Address();
        $this->shipping_address->denormalize($denormalizer, $data['shipping_address'], $format);
        $this->billing_address = new Address();
        $this->billing_address->denormalize($denormalizer, $data['billing_address'], $format);

        $this->adherent_number = isset($data['adherent_number']) ? $data['adherent_number'] : "";
        $this->order_culture = isset($data['order_culture']) ? $data['order_culture'] : "";
        $this->order_id = isset($data['order_id']) ? $data['order_id'] : "";

        $this->orders_detail = new \ArrayObject();

        if (isset($data['order_detail'][0])) {
            foreach ($data['order_detail'] as $order_detail) {
                $tmpObj = new OrderDetail();
                $tmpObj->denormalize($denormalizer, $order_detail, $format);
                $this->orders_detail[] = $tmpObj;
            }
        } elseif (!empty($data['order_detail'])) {
            $tmpObj = new OrderDetail();
            $tmpObj->denormalize($denormalizer, $data['order_detail'], $format);
            $this->orders_detail[] = $tmpObj;
        }
    }

    /**
     * Shop's unique identifier from fnac
     *
     * @return string
     */
    public function getShopId()
    {
        return $this->shop_id;
    }

    /**
     * Client's unique identifier from fnac
     *
     * @return string
     */
    public function getClientId()
    {
        return $this->client_id;
    }

    /**
     * Client's firstname
     *
     * @return string
     */
    public function getClientFirstname()
    {
        return $this->client_firstname;
    }

    /**
     * Client's lastname
     *
     * @return string
     */
    public function getClientLastname()
    {
        return $this->client_lastname;
    }

    /**
     * Client's email
     *
     * @return string
     */
    public function getClientEmail()
    {
        return $this->client_email;
    }

    /**
     * Client's adherent number
     *
     * @return string
     */
    public function getAdherentNumber()
    {
        return $this->adherent_number;
    }

    /**
     * Order's culture
     *
     * @return string
     */
    public function getOrderCulture()
    {
        return $this->order_culture;
    }

    /**
     * Order's state
     *
     * @see FnacApiClient\Type\OrderStateType
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Order's creation date
     *
     * @return date
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Order's fees with all tax
     *
     * @return float
     */
    public function getFees()
    {
        return $this->fees;
    }

    /**
     * Number of messages associated to this order
     *
     * @return integer
     */
    public function getNbMessages()
    {
        return $this->nb_messages;
    }

    /**
     * Url of delivery note in PDF
     *
     * This link contains your login information do not share it
     *
     * @return string
     */
    public function getDeliveryNote()
    {
        return $this->delivery_note;
    }

    /**
     * Client's shipping address
     *
     * @see Address
     *
     * @return Address
     */
    public function getShippingAddress()
    {
        return $this->shipping_address;
    }

    /**
     * Client's billing address
     *
     * @see Address
     *
     * @return Address
     */
    public function getBillingAddress()
    {
        return $this->billing_address;
    }
}

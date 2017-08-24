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
 * OrderUpdate definition.
 *
 * @author     Fnac
 * @version    1.0.0
 */

class OrderUpdate extends Entity
{
    private $status;
    private $order_id;
    private $state;

    private $errors;
    private $orders_detail;

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
        $this->order_id = $data['order_id'];
        $this->status = $data['status'];
        $this->state = $data['state'];

        $this->errors = new \ArrayObject();

        if (isset($data['error'])) {
            if (isset($data['error'][0])) {
                foreach ($data['error'] as $error) {
                    $tmpObj = new Error();
                    $tmpObj->denormalize($serializer, $error, $format);
                    $this->errors[] = $tmpObj;
                }
            } else {
                $tmpObj = new Error();
                $tmpObj->denormalize($serializer, $data['error'], $format);
                $this->errors[] = $tmpObj;
            }
        }

        $this->orders_detail = new \ArrayObject();

        if (isset($data['order_detail'])) {
            if (isset($data['order_detail'][0])) {
                foreach ($data['order_detail'] as $order_detail) {
                    $tmpObj = new OrderDetailUpdate();
                    $tmpObj->denormalize($serializer, $order_detail, $format);
                    $this->orders_detail[] = $tmpObj;
                }
            } else {
                $tmpObj = new OrderDetailUpdate();
                $tmpObj->denormalize($serializer, $data['order_detail'], $format);
                $this->orders_detail[] = $tmpObj;
            }
        }
    }

    /**
     * Order's unique identifier (fnac one)
     *
     * @return string
     */
    public function getOrderId()
    {
        return $this->order_id;
    }

    /**
     * Order update status
     *
     * @see FnacApiClient\Type\ResponseStatusType
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Errors list happen during update
     *
     * @see Error
     *
     * @return ArrayObject<Error>
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Order details update associate to this order
     *
     * @return ArrayObject<OrderDetailUpdate>
     */
    public function getOrdersDetail()
    {
        return $this->orders_detail;
    }

    /**
     * New order's state
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }
}

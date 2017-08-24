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
 * OrderDetailUpdate definition.
 *
 * @author     Fnac
 * @version    1.0.0
 */

class OrderDetailUpdate extends Entity
{
    private $order_detail_id;
    private $status;
    private $state;
    private $errors;

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
        $this->order_detail_id = $data['order_detail_id'];
        $this->status = $data['status'];
        $this->state = isset($data['state']) ? $data['state'] : "";

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
    }

    /**
     * Order detail unique identifier (fnac one)
     *
     * @return integer
     */
    public function getOrderDetailId()
    {
        return $this->order_detail_id;
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
     * Order detail update status
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
     * Errors list of order detail update
     *
     * @see Error
     *
     * @return ArrayObject<Error>
     */
    public function getErrors()
    {
        return $this->errors;
    }
}

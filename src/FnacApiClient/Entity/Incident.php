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
use Symfony\Component\Serializer\Normalizer\NormalizableInterface;

/**
 * Incident definition.
 *
 * @author     Fnac
 * @version    1.0.0
 */
class Incident extends Entity
{
    private $status;
    private $waiting_for_seller_answer;
    private $message;
    private $opened_by;
    private $closed_by;
    private $closed_status;
    private $closed_at;
    private $created_at;
    private $updated_at;
    private $order_id;
    private $id;

    private $order_details_incident = array();

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
        $this->id = $data['@id'];
        $this->status = $data['header']['status'];

        $this->waiting_for_seller_answer = $data['header']['waiting_for_seller_answer'];
        $this->message = $data['header']['message'];
        $this->opened_by = $data['header']['opened_by'];

        if (isset($data['header']['closed_by'])) {
            $this->closed_by = $data['header']['closed_by'];
        }

        $this->created_at = $data['header']['created_at'];
        $this->updated_at = $data['header']['updated_at'];

        if (isset($data['header']['closed_at'])) {
            $this->closed_at = $data['header']['closed_at'];
        }

        if (isset($data['header']['closed_status'])) {
            $this->closed_status = $data['header']['closed_status'];
        }

        $this->order_id = $data['header']['order_id'];

        $this->order_details_incident = new \ArrayObject();

        if (isset($data['order_details_incident']['order_detail_incident'][0])) {
            foreach ($data['order_details_incident']['order_detail_incident'] as $order_detail_incident) {
                $tmpObj = new OrderDetailIncident();
                $tmpObj->denormalize($denormalizer, $order_detail_incident, $format);
                $this->order_details_incident[] = $tmpObj;
            }
        } elseif (!empty($data['order_details_incident']['order_detail_incident'])) {
            $tmpObj = new OrderDetailIncident();
            $tmpObj->denormalize($denormalizer, $data['order_details_incident']['order_detail_incident'], $format);
            $this->order_details_incident[] = $tmpObj;
        }
    }

    /**
     *
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     *
     * @return string
     */
    public function getWaitingForSellerAnswer()
    {
        return $this->waiting_for_seller_answer;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return string
     */
    public function getOpenedBy()
    {
        return $this->opened_by;
    }

    /**
     * @return string
     */
    public function getClosedBy()
    {
        return $this->closed_by;
    }

    /**
     * @return string
     */
    public function getClosedStatus()
    {
        return $this->closed_status;
    }

    /**
     * @return date
     */
    public function getClosedAt()
    {
        return $this->closed_at;
    }

    /**
     * @return date
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @return date
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getOrderId()
    {
        return $this->order_id;
    }

    /**
     * @return ArrayObject<OrderDetailIncident>
     */
    public function getOrderDetailsIncident()
    {
        return $this->order_details_incident;
    }
}

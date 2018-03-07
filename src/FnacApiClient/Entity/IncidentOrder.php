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

use FnacApiClient\Entity\IncidentOrderDetail;
use FnacApiClient\Type\IncidentUpdateActionType;

/**
 * IncidentOrder definition.
 *
 * @author     Fnac
 * @version    1.0.0
 */

class IncidentOrder extends Entity
{

    /** Get Var **/
    private $incident_id;
    private $order_id;
    private $action;
    private $orders_details_incident;

    private $errors;

    /**
     * {@inheritdoc}
     */
    public function __construct()
    {
        $this->orders_details_incident = new \ArrayObject();
    }

    /**
     * {@inheritDoc}
     */
    public function normalize(NormalizerInterface $normalizer, $format = null, array $context = array())
    {
        $data = array();

        $data['@action'] = $this->action;

        if ($this->order_id) {
            $data['@order_id'] = $this->order_id;
        }
        if ($this->incident_id) {
            $data['@incident_id'] = $this->incident_id;
        }

        if ($this->action == IncidentUpdateActionType::REFUND) {
            $data['order_detail'] = array();

            if ($this->orders_details_incident->count() > 1) {
                foreach ($this->orders_details_incident as $order_details_incident) {
                    $data['order_detail'][] = $order_details_incident->normalize($normalizer, $format);
                }
            } elseif ($this->orders_details_incident->count()) {
                $data['order_detail'] = $this->orders_details_incident[0]->normalize($normalizer, $format);
            }
        }

        return $data;
    }

    /**
     * {@inheritDoc}
     */
    public function denormalize(DenormalizerInterface $denormalizer, $data, $format = null, array $context = array())
    {
    }

    /**
     * Unique order's identifier given by fnac
     *
     * @return string
     */
    public function getOrderId()
    {
        return $this->order_id;
    }

    /**
     * @param string $opened_by : Who have create this incident
     */
    public function setOrderId($order_id)
    {
        $this->order_id = $order_id;
    }

    /**
     * @param string $incident_id : Unique Incident identifier given by fnac
     */
    public function setIncidentId($incident_id)
    {
        $this->incident_id = $incident_id;
    }

    /**
     * Set action to do on incident
     *
     * @see FnacApiClient\Type\IncidentUpdateActionType
     *
     * @param string $action : Action to do on order
     */
    public function setAction($action)
    {
        $this->action = $action;
    }

    /**
     * Add an orderDetail assocaited to an order
     *
     * @see FnacApiClient\Entity\IncidentOrderDetail
     *
     * @param IncidentOrderDetail $order_detail : OrderDetail request for Incident
     */
    public function addOrderDetail(IncidentOrderDetail $order_detail)
    {
        $this->orders_details_incident[] = $order_detail;
    }

    /**
     * Add an orderDetail assocaited to an order
     *
     * @param ArrayObject $order_details : IncidentOrderDetails request for Incident
     */
    public function addOrderDetails(\ArrayObject $order_details)
    {
        if (is_array($this->orders_details_incident)) {
            $this->orders_details_incident = array_merge($this->orders_details_incident, $order_details);
        } else {
            $this->orders_details_incident = $order_details;
        }
    }

    /**
     * Order details update associate to this order
     *
     * @return ArrayObject<IncidentOrderDetail>
     */
    public function getOrdersDetail()
    {
        return $this->orders_details_incident;
    }

    /**
     * Errors that happens during update
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

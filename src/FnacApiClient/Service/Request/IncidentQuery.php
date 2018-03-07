<?php
/*
 * This file is part of the fnacMarketPlace APi Client.
 * (c) 2011 Fnac
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FnacApiClient\Service\Request;

use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

use FnacApiClient\Type\SortOrderType;
use FnacApiClient\Type\StatusType;
use FnacApiClient\Type\BoolType;
use FnacApiClient\Type\UserType;
use FnacApiClient\Type\IncidentCloseStatusType;
use FnacApiClient\Type\IncidentOpenStatusType;

/**
 * IncidentQuery Service's definition.
 *
 * @author     Fnac
 * @version    1.0.0
 */

class IncidentQuery extends Query
{
    const ROOT_NAME = "incidents_query";
    const XSD_FILE = "IncidentsQueryService.xsd";
    const CLASS_RESPONSE = "FnacApiClient\Service\Response\IncidentQueryResponse";

    private $sort_by = null;
    private $status = null;
    private $orders = null;
    private $types = null;
    private $incidents_id = null;
    private $opened_by = null;
    private $closed_by = null;
    private $waiting_for_seller_answer = null;
    private $closed_statuses = null;

    public function normalize(NormalizerInterface $normalizer, $format = null, array $context = array())
    {
        $data = parent::normalize($normalizer, $format);

        if (!is_null($this->sort_by)) {
            $data['sort_by'] = $this->sort_by;
        }

        if (!is_null($this->status)) {
            $data['status'] = $this->status;
        }

        if (!is_null($this->opened_by)) {
            $data['opened_by'] = $this->opened_by;
        }

        if (!is_null($this->closed_by)) {
            $data['closed_by'] = $this->closed_by;
        }

        if (!is_null($this->waiting_for_seller_answer)) {
            $data['waiting_for_seller_answer'] = $this->waiting_for_seller_answer;
        }

        if (!is_null($this->orders)) {
            $data['orders'] = $this->orders;
        }

        if (!is_null($this->types)) {
            $data['types'] = $this->types;
        }

        if (!is_null($this->closed_statuses)) {
            $data['closed_statuses'] = $this->closed_statuses;
        }

        if (!is_null($this->incidents_id)) {
            $data['incidents_id'] = $this->incidents_id;
        }

        return $data;
    }

    /**
     * @param string $sort_by : In which order you want to sort your result
     */
    public function setSortBy($sort_by)
    {
        $this->sort_by = $sort_by;
    }

    /**
     * @see FnacApiClient\Type\StatusType
     *
     * @param string $status : Status of incident
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @param string $opened_by : Who have create this incident
     */
    public function setOpenedBy($opened_by)
    {
        $this->opened_by = $opened_by;
    }

    /**
     * @param string $closed_by : Who have closed this incident
     */
    public function setClosedBy($closed_by)
    {
        $this->closed_by = $closed_by;
    }

    /**
     * @param string $waiting_for_seller_answer : Filter incident where i didn't give an answer
     */
    public function setWaitingForSellerAnswer($waiting_for_seller_answer)
    {
        $this->waiting_for_seller_answer = $waiting_for_seller_answer;
    }

    /**
     * @param array $orders : Order columns
     */
    public function setOrders(array $orders)
    {
        $this->orders = $orders;
    }

    /**
     * @param array $types : Types of incidents
     */
    public function setTypes($types)
    {
        $this->types = $types;
    }

    /**
     * @param array $closed_statuses : Closed types of incidents
     */
    public function setClosedStatuses($closed_statuses)
    {
        $this->closed_statuses = $closed_statuses;
    }

    /**
     * @param array $incidents_id : List of incident id to get
     */
    public function setIncidentsId($incidents_id)
    {
        $this->incidents_id = $incidents_id;
    }

}

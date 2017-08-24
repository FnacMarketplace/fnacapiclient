<?php
/*
 * This file is part of the fnacMarketPlace APi Client.
 * (c) 2011 Fnac
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FnacApiClient\Service\Request;

use Symfony\Component\Serializer\SerializerInterface;

/**
 * MessageQuery Service's definition.
 *
 * @author     Fnac
 * @version    1.0.0
 */

class MessageQuery extends Query
{
    const ROOT_NAME = "messages_query";
    const XSD_FILE = "MessagesQueryService.xsd";
    const CLASS_RESPONSE = "FnacApiClient\Service\Response\MessageQueryResponse";

    private $message_type;
    private $message_state;
    private $message_archived;
    private $message_id;
    private $order_fnac_id;
    private $offer_fnac_id;
    private $offer_seller_id;
    private $sort_by_type;
    private $sort_by;

    /**
     * {@inheritdoc}
     */
    public function normalize(SerializerInterface $serializer, $format = null)
    {
        $data = parent::normalize($serializer, $format);

        if (!is_null($this->message_type)) {
            $data['message_type'] = $this->message_type;
        }

        if (!is_null($this->message_state)) {
            $data['message_state'] = $this->message_state;
        }
        if (!is_null($this->message_archived)) {
            $data['message_archived'] = $this->message_archived;
        }

        if (!is_null($this->message_id)) {
            $data['message_id'] = $this->message_id;
        }

        if (!is_null($this->order_fnac_id)) {
            $data['order_fnac_id'] = $this->order_fnac_id;
        }

        if (!is_null($this->offer_fnac_id)) {
            $data['offer_fnac_id'] = $this->offer_fnac_id;
        }

        if (!is_null($this->offer_seller_id)) {
            $data['offer_seller_id'] = $this->offer_seller_id;
        }

        if (!is_null($this->sort_by)) {
            $data['sort_by'] = array(
                '#' => $this->sort_by, '@type' => $this->sort_by_type
            );
        }

        return $data;
    }

    /**
     * Set message's type
     *
     * @param string $message_type : Type of message
     * @see FnacApicClient\Type\MessageType
     */
    public function setMessageType($message_type)
    {
        $this->message_type = $message_type;
    }

    /**
     * Set message's state
     *
     * @param string $message_state : State of message
     * @see FnacApicClient\Type\MessageStateType
     */
    public function setMessageState($message_state)
    {
        $this->message_state = $message_state;
    }

    /**
     * Set if message is archived or not
     *
     * @param string $message_archived : Is message archived or not ?
     * @see FnacApicClient\Type\BoolType
     */
    public function setMessageArchived($message_archived)
    {
        $this->message_archived = $message_archived;
    }

    /**
     * Set message's unique identifier from fnac
     *
     * @param string $message_id : Uid of message
     */
    public function setMessageId($message_id)
    {
        $this->message_id = $message_id;
    }

    /**
     * Set order unique identifier from fnac
     *
     * @param string $order_fnac_id : Order fnac uid
     */
    public function setOrderFnacId($order_fnac_id)
    {
        $this->order_fnac_id = $order_fnac_id;
    }

    /**
     * Set offer unique identifier from fnac
     *
     * @param string $offer_fnac_id : Offer fnac uid
     */
    public function setOfferFnacId($offer_fnac_id)
    {
        $this->offer_fnac_id = $offer_fnac_id;
    }

    /**
     * Set offer unique identifier from seller
     *
     * @param string $offer_seller_id : Offer seller uid
     */
    public function setOfferId($offer_seller_id)
    {
        $this->offer_seller_id = $offer_seller_id;
    }

    /**
     * Set field on which we want the sort
     *
     * @param string $sort_by : Field to sort by
     * @see FnacApicClient\Type\SortType
     */
    public function setSortBy($sort_by)
    {
        $this->sort_by = $sort_by;
    }

    /**
     * Set the sort order
     *
     * @param string $sort_by_type : Order to sort (ASC or DESC)
     * @see FnacApicClient\Type\SortOrderType
     */
    public function setSortByType($sort_by_type)
    {
        $this->sort_by_type = $sort_by_type;
    }
}

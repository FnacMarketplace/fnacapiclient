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
 * Represent a customer comment for an order
 *
 * @author     Fnac
 * @version    1.0.0
 */

class ClientOrderComment extends Entity
{
    private $rate;
    private $order_fnac_id;
    private $client_order_comment_id;
    private $client_name;
    private $comment;
    private $reply;
    private $is_received;
    private $is_fast;
    private $is_well_packed;
    private $is_good_shape;
    private $created_at;

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
        $this->rate = $data['rate'];
        $this->order_fnac_id = $data['order_fnac_id'];
        $this->client_order_comment_id = $data['client_order_comment_id'];
        $this->client_name = $data['client_name'];
        $this->comment = $data['comment'];
        $this->reply = $data['reply'];
        $this->is_received = (boolean) $data['is_received'];
        $this->is_fast = (boolean) $data['is_fast'];
        $this->is_well_packed = (boolean) $data['is_well_packed'];
        $this->is_good_shape = (boolean) $data['is_good_shape'];
        $this->created_at = $data['created_at'];
    }

    /**
     * Rate given by client
     *
     * @return integer
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Order's unique identifier from fnac associate to this order
     *
     * @return string
     */
    public function getOrderFnacId()
    {
        return $this->order_fnac_id;
    }

    /**
     * Comment's unique identifier from fnac
     *
     * @return string
     */
    public function getClientOrderCommentId()
    {
        return $this->client_order_comment_id;
    }

    /**
     * Client's name
     *
     * @return string
     */
    public function getClientName()
    {
        return $this->client_name;
    }

    /**
     * Comment's content
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Comment's reply from seller
     *
     * @return string
     */
    public function getReply()
    {
        return $this->reply;
    }

    /**
     * Order has been received by client ?
     *
     * @return boolean
     */
    public function getIsReceived()
    {
        return $this->is_received;
    }

    /**
     * Order has been received in a short delay ?
     *
     * @return boolean
     */
    public function getIsFast()
    {
        return $this->is_fast;
    }

    /**
     * Order was well packaged ?
     *
     * @return boolean
     */
    public function getIsWellPackaged()
    {
        return $this->is_well_packed;
    }

    /**
     * Order is in good shape ?
     *
     * @return boolean
     */
    public function getIsGoodShape()
    {
        return $this->is_good_shape;
    }

    /**
     * Creation date of comment
     *
     * @return date
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }
}

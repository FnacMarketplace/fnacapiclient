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
use FnacApiClient\Type\CompareType;

/**
 * ClientOrderCommentQuery Service's definition.
 *
 * @author     Fnac
 * @version    1.0.0
 */

class ClientOrderCommentQuery extends Query
{

    const ROOT_NAME = "client_order_comments_query";
    const XSD_FILE = "ClientOrderCommentsQueryService.xsd";
    const CLASS_RESPONSE = "FnacApiClient\Service\Response\ClientOrderCommentQueryResponse";

    private $rate_type = "Equals";
    private $rate = null;
    private $client_order_comment_id = null;
    private $order_fnac_id = null;

    /**
     * {@inheritdoc}
     */
    public function normalize(SerializerInterface $serializer, $format = null)
    {
        $data = parent::normalize($serializer, $format);

        if (!is_null($this->rate)) {
            $data['rate'] = array(
                '@mode' => $this->rate_type, '@value' => $this->rate
            );
        }

        if (!is_null($this->order_fnac_id)) {
            $data['order_fnac_id'] = $this->order_fnac_id;
        }

        if (!is_null($this->client_order_comment_id)) {
            $data['client_order_comment_id'] = $this->client_order_comment_id;
        }

        return $data;
    }

    /**
     * Set order's rate filter value
     *
     * @param integer $rate : Order's rate
     */
    public function setRate($rate)
    {
        $this->rate = $rate;
    }

    /**
     * Set rate comparison type filter
     *
     * @see FnacApiClient\Type\CompareType
     *
     * @param string $rate_type : Rate comparison type
     */
    public function setRateType($rate_type)
    {
        $this->rate_type = $rate_type;
    }

    /**
     * Set order unique identifier filter from fnac
     *
     * @param string $order_fnac_id : Order unique identifier
     */
    public function setOrderFnacId($order_fnac_id)
    {
        $this->order_fnac_id = $order_fnac_id;
    }

    /**
     * Set client order comment unique identifier filter from fnac
     *
     * @param string $client_order_comment_id : Client order comment unique identifier
     */
    public function setClientOrderCommentId($client_order_comment_id)
    {
        $this->client_order_comment_id = $client_order_comment_id;
    }
}

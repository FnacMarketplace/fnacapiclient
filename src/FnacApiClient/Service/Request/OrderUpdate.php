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
use Symfony\Component\Serializer\SerializerInterface;

use FnacApiClient\Entity\Order;

/**
 * OrderUpdate Service's definition.
 *
 * @author     Fnac
 * @version    1.0.0
 */

class OrderUpdate extends Authentified
{
    const ROOT_NAME = "orders_update";
    const XSD_FILE = "OrdersUpdateService.xsd";
    const CLASS_RESPONSE = "FnacApiClient\Service\Response\OrderUpdateResponse";

    private $orders = array();

    /**
     * {@inheritdoc}
     */
    public function __construct(array $parameters = null)
    {
        parent::__construct($parameters);

        $this->orders = new \ArrayObject();
    }

    /**
     * {@inheritdoc}
     */
    public function normalize(NormalizerInterface $normalizer, $format = null, array $context = array())
    {
        $data = parent::normalize($normalizer, $format);

        $data['order'] = array();

        if ($this->orders->count() > 1) {
            foreach ($this->orders as $order) {
                $data['order'][] = $order->normalize($normalizer, $format);
            }
        } elseif ($this->orders->count()) {
            $data['order'] = $this->orders[0]->normalize($normalizer, $format);
        }

        return $data;
    }

    /**
     * Add order to update
     *
     * @param Order $order Order to update
     * @return void
     */
    public function addOrder(Order $order)
    {
        $this->orders[] = $order;
    }
}

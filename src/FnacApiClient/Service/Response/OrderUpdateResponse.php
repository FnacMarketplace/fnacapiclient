<?php
/*
 * This file is part of the fnacApi.
 * (c) 2011 Fnac
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FnacApiClient\Service\Response;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use FnacApiClient\Entity\OrderUpdate;

/**
 * OrderUpdateResponse service base definition for order update response.
 *
 * @author     Fnac
 * @version    1.0.0
 */
class OrderUpdateResponse extends ResponseService
{
    private $orders_update;

    /**
     * {@inheritdoc}
     */
    public function denormalize(DenormalizerInterface $denormalizer, $data, $format = null, array $context = array())
    {
        parent::denormalize($denormalizer, $data, $format);

        $this->orders_update = new \ArrayObject();

        if (isset($data['order'])) {
            if (isset($data['order'][0])) {
                foreach ($data['order'] as $order) {
                    $tmpObj = new OrderUpdate();
                    $tmpObj->denormalize($denormalizer, $order, $format);
                    $this->orders_update[] = $tmpObj;
                }
            } else {
                $tmpObj = new OrderUpdate();
                $tmpObj->denormalize($denormalizer, $data['order'], $format);
                $this->orders_update[] = $tmpObj;
            }
        }
    }

    /**
     * Return the list of order updated
     *
     * @see FnacApiClient\Entity\OrderUpdate
     *
     * @return ArrayObject<OrderUpdate>
     */
    public function getOrdersUpdate()
    {
        return $this->orders_update;
    }
}

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
 * OrderDetailIncident definition.
 *
 * @author     Fnac
 * @version    1.0.0
 */

class OrderDetailIncident extends Entity
{
    private $type;
    private $status;
    private $created_at;
    private $updated_at;

    private $refunds = array();

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
        $this->type = $data['type'];
        $this->status = $data['status'];
        $this->created_at = $data['created_at'];
        $this->updated_at = $data['updated_at'];

        $this->refunds = new \ArrayObject();

        if (isset($data['refunds']['refund'][0])) {
            foreach ($data['refunds']['refund'] as $refund) {
                $tmpObj = new Refund();
                $tmpObj->denormalize($serializer, $refund, $format);
                $this->refunds[] = $tmpObj;
            }
        } elseif (!empty($data['refunds']['refund'])) {
            $tmpObj = new Refund();
            $tmpObj->denormalize($serializer, $data['refunds']['refund'], $format);
            $this->refunds[] = $tmpObj;
        }
    }

    /**
     * @return integer
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
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
     * @return ArrayObject<Refund>
     */
    public function getRefunds()
    {
        return $this->refunds;
    }
}

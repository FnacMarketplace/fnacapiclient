<?php
/*
 * This file is part of the fnacApi.
 * (c) 2011 Fnac
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FnacApiClient\Service\Response;

use Symfony\Component\Serializer\SerializerInterface;

use FnacApiClient\Entity\Carrier;

/**
 * BatchQueryResponse service base definition for batch query response
 *
 * @author     Fnac
 * @version    1.0.0
 */
class CarrierQueryResponse extends ResponseService
{
    private $carriers = array();

    /**
     * {@inheritdoc}
     */
    public function denormalize(SerializerInterface $serializer, $data, $format = null)
    {
        parent::denormalize($serializer, $data, $format);

        $this->carriers = new \ArrayObject();
        foreach ($data['carrier'] as $carrier) {
            $carrObj = new Carrier();
            $carrObj->denormalize($serializer, $carrier, $format);
            $this->carriers[] = $carrObj;
        }
    }

    /**
     * Carrier list
     *
     * @see FnacApiClient\Entity\Carrier
     *
     * @return ArrayObject<Carrier>
     */
    public function getCarriers()
    {
        return $this->carriers;
    }
}

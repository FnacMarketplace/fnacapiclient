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

use FnacApiClient\Entity\Incident;

/**
 * IncidentQueryResponse service base definition for incident query response
 *
 * @author     Fnac
 * @version    1.0.0
 */
class IncidentQueryResponse extends ResponseService
{
    private $incidents;

    /**
     * {@inheritdoc}
     */
    public function denormalize(SerializerInterface $serializer, $data, $format = null)
    {
        parent::denormalize($serializer, $data, $format);

        $this->incidents = new \ArrayObject();
        if (isset($data['incident'])) {
            if (isset($data['incident'][0])) {
                foreach ($data['incident'] as $order_detail_incident) {
                    $tmpObj = new Incident();
                    $tmpObj->denormalize($serializer, $order_detail_incident, $format);
                    $this->incidents[] = $tmpObj;
                }
            } elseif (!empty($data['incident'])) {
                $tmpObj = new Incident();
                $tmpObj->denormalize($serializer, $data['incident'], $format);
                $this->incidents[] = $tmpObj;
            }
        }
    }

    /**
     * Incident list
     *
     * @see FnacApiClient\Entity\Incident
     *
     * @return ArrayObject<Incident>
     */
    public function getIncidents()
    {
        return $this->incidents;
    }

    /**
     * Incident's unique identifier given by fnac
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }
}

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

/**
 * OfferUpdateResponse service base definition for offer update response.
 *
 * @author     Fnac
 * @version    1.0.0
 */
class OfferUpdateResponse extends ResponseService
{
    private $batch_id;

    /**
     * {@inheritdoc}
     */
    public function denormalize(SerializerInterface $serializer, $data, $format = null)
    {
        parent::denormalize($serializer, $data, $format);

        $this->batch_id = $data['batch_id'];
    }

    /**
     * Return the batch id of offer update
     *
     * @return string
     */
    public function getBatchId()
    {
        return $this->batch_id;
    }
}

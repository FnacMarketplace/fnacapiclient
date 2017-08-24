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

use FnacApiClient\Entity\Batch;

/**
 * BatchQueryResponse service base definition for batch query response
 *
 * @author     Fnac
 * @version    1.0.0
 */
class BatchQueryResponse extends ResponseService
{
    private $nb_batch_running;
    private $nb_batch_active;
    private $batchs = null;

    /**
     * {@inheritdoc}
     */
    public function denormalize(SerializerInterface $serializer, $data, $format = null)
    {
        parent::denormalize($serializer, $data, $format);

        $this->nb_batch_running = $data['nb_batch_running'];
        $this->nb_batch_active = $data['nb_batch_active'];

        $this->batchs = new \ArrayObject();

        if (isset($data['batch'])) {
            if (isset($data['batch'][0])) {
                foreach ($data['batch'] as $batch) {
                    $tmpObj = new Batch();
                    $tmpObj->denormalize($serializer, $batch, $format);
                    $this->batchs[] = $tmpObj;
                }
            } elseif (!empty($data['batch'])) {
                $tmpObj = new Batch();
                $tmpObj->denormalize($serializer, $data['batch'], $format);
                $this->batchs[] = $tmpObj;
            }
        }
    }

    /**
     * Number of imports being processed
     *
     * @return integer
     */
    public function getNbBatchRunning()
    {
        return $this->nb_batch_running;
    }

    /**
     * Number of imports waiting to be processed
     *
     * @return integer
     */
    public function getNbBatchActive()
    {
        return $this->nb_batch_active;
    }

    /**
     * List of batch being processed or waiting to be processed
     *
     * @see FnacApiClient\Entity\Batch
     *
     * @return ArrayObject<Batch>
     */
    public function getBatchs()
    {
        return $this->batchs;
    }
}

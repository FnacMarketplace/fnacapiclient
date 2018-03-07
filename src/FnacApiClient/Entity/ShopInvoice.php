<?php
/*
 * This file is part of the fnacMarketPlace APi Client.
 * (c) 2014 Fnac
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FnacApiClient\Entity;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Represent a Shop invoice
 *
 * @author     Fnac
 * @version    1.0.0
 */

class ShopInvoice extends Entity
{
    private $invoice_id;
    private $url;
    private $created_at;

    /**
     * {@inheritDoc}
     */
    public function normalize(NormalizerInterface $normalizer, $format = null, array $context = array())
    {

    }

    /**
     * {@inheritDoc}
     */
    public function denormalize(DenormalizerInterface $denormalizer, $data, $format = null, array $context = array())
    {
        $this->invoice_id = $data['invoice_id'];
        $this->url = $data['url'];
        $this->created_at = $data['created_at'];
    }

   /**
    * Return the invoice id
    *
    * @return string
    */
    public function getInvoiceId()
    {
        return $this->invoice_id;
    }

   /**
    * Return url to download invoice from
    *
    * @return string
    */
    public function getUrl()
    {
        return $this->url;
    }

   /**
    * Return invoice creation date
    *
    * @return datetime
    */
    public function getCreatedAt()
    {
        return $this->created_at;
    }
}

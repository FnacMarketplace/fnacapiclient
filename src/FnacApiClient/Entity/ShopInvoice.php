<?php
/*
 * This file is part of the fnacMarketPlace APi Client.
 * (c) 2014 Fnac
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FnacApiClient\Entity;

use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizableInterface;

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
    public function normalize(SerializerInterface $serializer, $format = null)
    {

    }

    /**
     * {@inheritDoc}
     */
    public function denormalize(SerializerInterface $serializer, $data, $format = null)
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

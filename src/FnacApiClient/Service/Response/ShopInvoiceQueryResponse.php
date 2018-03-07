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
use Symfony\Component\Serializer\SerializerInterface;

use FnacApiClient\Entity\ShopInvoice;

/**
 * BatchQueryResponse service base definition for batch query response
 *
 * @author     Fnac
 * @version    1.0.0
 */
class ShopInvoiceQueryResponse extends QueryResponse
{
    private $shop_invoices = array();

    /**
     * {@inheritdoc}
     */
    public function denormalize(DenormalizerInterface $denormalizer, $data, $format = null, array $context = array())
    {
        parent::denormalize($denormalizer, $data, $format);
        
        $this->shop_invoices = new \ArrayObject();
        
        if(!empty($data['shop_invoice'])) {
            foreach ($data['shop_invoice'] as $shop_invoice) {
                $shopInvoiceObj = new ShopInvoice();
                $shopInvoiceObj->denormalize($denormalizer, $shop_invoice, $format);
                $this->shop_invoices[] = $shopInvoiceObj;
            }
        }
    }

    /**
     * List of shops' invoices
     *
     * @see FnacApiClient\Entity\ShopInvoice
     *
     * @return ArrayObject<ShopInvoice>
     */
    public function getShopInvoices()
    {
        return $this->shop_invoices;
    }
}

<?php
/*
 * This file is part of the fnacMarketPlace APi Client.
 * (c) 2014 Fnac
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FnacApiClient\Service\Request;

use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

/**
 * BatchQuery Service's definition.
 *
 * @author     Fnac
 * @version    1.0.0
 */

class ShopInvoiceQuery extends Query
{
    const ROOT_NAME = "shop_invoices_query";
    const XSD_FILE = "ShopInvoicesQueryService.xsd";
    const CLASS_RESPONSE = "FnacApiClient\Service\Response\ShopInvoiceQueryResponse";
    
    /**
     * {@inheritdoc}
     */
    public function normalize(NormalizerInterface $normalizer, $format = null, array $context = array())
    {
        return parent::normalize($normalizer, $format);
    }
}

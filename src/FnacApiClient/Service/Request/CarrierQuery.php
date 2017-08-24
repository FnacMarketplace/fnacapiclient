<?php
/*
 * This file is part of the fnacMarketPlace APi Client.
 * (c) 2011 Fnac
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FnacApiClient\Service\Request;

use Symfony\Component\Serializer\SerializerInterface;

/**
 * CarrierQuery Service's definition.
 *
 * @author     Fnac
 * @version    1.0.0
 */

class CarrierQuery extends Authentified
{
    const ROOT_NAME = "carriers_query";
    const XSD_FILE = "CarriersQueryService.xsd";
    const CLASS_RESPONSE = "FnacApiClient\Service\Response\CarrierQueryResponse";

    /**
     * {@inheritdoc}
     */
    public function normalize(SerializerInterface $serializer, $format = null)
    {
        return array_merge(parent::normalize($serializer, $format), array(
            'query' => 'all'
        ));
    }
}

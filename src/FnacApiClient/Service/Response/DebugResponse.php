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
 * BatchQueryResponse service base definition for batch query response
 *
 * @author     Fnac
 * @version    1.0.0
 */
class DebugResponse extends ResponseService
{
    public function denormalize(SerializerInterface $serializer, $data, $format = null)
    {
        print_r($data);
    }
}

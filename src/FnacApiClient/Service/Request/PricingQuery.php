<?php
/*
 * This file is part of the fnacMarketPlace APi Client.
 * (c) 2011 Fnac
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FnacApiClient\Service\Request;

use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;

use FnacApiClient\Entity\ProductReference;

/**
 * PricingQuery Service's definition.
 *
 * @author     Fnac
 * @version    1.0.0
 */

class PricingQuery extends Authentified
{
    const ROOT_NAME = "pricing_query";
    const XSD_FILE = "PricingQueryService.xsd";
    const CLASS_RESPONSE = "FnacApiClient\Service\Response\PricingQueryResponse";

    private $product_reference = null;

    /**
     * {@inheritdoc}
     */
    public function __construct(array $parameters = null)
    {
        parent::__construct($parameters);

        $this->product_reference = new \ArrayObject();
    }

    /**
     * {@inheritdoc}
     */
    public function normalize(NormalizerInterface $normalizer, $format = null, array $context = array())
    {
        $data = parent::normalize($normalizer, $format);

        if (!is_null($this->sellers)) {
            $data['@sellers'] = $this->sellers;
        }

        $data['product_reference'] = array();

        if ($this->product_reference->count() > 1) {
            foreach ($this->product_reference as $product_reference) {
                $data['product_reference'][] = $product_reference->normalize($normalizer, $format);
            }
        } elseif ($this->product_reference->count()) {
            $data['product_reference'] = $this->product_reference[0]->normalize($normalizer, $format);
        }

        return $data;
    }

    /**
     * Set seller's type
     *
     * @see FnacApiClient\Type\SellerType
     *
     * @param string $sellers : Type of sellers (all, others)
     */
    public function setSellers($sellers)
    {
        $this->sellers = $sellers;
    }

    /**
     * Add a product reference to query
     *
     * @param ProductReference $product_reference : Product reference to query
     */
    public function addProductReference($product_reference)
    {
        $this->product_reference[] = $product_reference;
    }
}

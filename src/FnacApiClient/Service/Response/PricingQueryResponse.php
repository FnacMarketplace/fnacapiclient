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

use FnacApiClient\Entity\PricingProduct;

/**
 * PricingQueryResponse service base definition for response when using message query.
 *
 * @author     Fnac
 * @version    1.0.0
 */
class PricingQueryResponse extends ResponseService
{
    private $pricing_products;

    /**
     * {@inheritdoc}
     */
    public function denormalize(SerializerInterface $serializer, $data, $format = null)
    {
        parent::denormalize($serializer, $data, $format);

        $this->pricing_products = new \ArrayObject();

        if (isset($data['pricing_product'])) {
            if (isset($data['pricing_product'][0])) {
                foreach ($data['pricing_product'] as $pricing_product) {
                    $tmpObj = new PricingProduct();
                    $tmpObj->denormalize($serializer, $pricing_product, $format);
                    $this->pricing_products[] = $tmpObj;
                }
            } elseif (!empty($data['pricing_product'])) {
                $tmpObj = new PricingProduct();
                $tmpObj->denormalize($serializer, $data['pricing_product'], $format);
                $this->pricing_products[] = $tmpObj;
            }
        }
    }

    /**
     * Pricing product list
     *
     * @see FnacApiClient\Entity\PricingProduct
     *
     * @return Array<PricingProduct>
     */
    public function getPricingProducts()
    {
        return $this->pricing_products;
    }
}

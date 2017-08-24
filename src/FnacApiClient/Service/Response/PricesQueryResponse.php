<?php
/*
 * This file is part of the fnacApi.
 * (c) 2017 Fnac
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FnacApiClient\Service\Response;

use Symfony\Component\Serializer\SerializerInterface;

use FnacApiClient\Entity\PricingProduct;

/**
 * PricesQueryResponse (Pricing V3) service base definition for response when using prices query.
 *
 * @author     Fnac
 * @version    1.0.0
 */
class PricesQueryResponse extends ResponseService
{
    private $pricing_products;

    /**
     * {@inheritdoc}
     */
    public function denormalize(SerializerInterface $serializer, $data, $format = null)
    {
        parent::denormalize($serializer, $data, $format);
        
        $this->pricing_products = new \ArrayObject();

        if (isset($data['pricing_products'])) {
            if (isset($data['pricing_products']['pricing_product'])) {
                foreach ($data['pricing_products']['pricing_product'] as $pricing_product) {
                    $tmpObj = new PricingProduct();
                    $tmpObj->denormalize($serializer, $pricing_product, $format);
                    $this->pricing_products[] = $tmpObj;
                }
            } elseif (!empty($data['pricing_products'])) {
                $tmpObj = new PricingProduct();
                $tmpObj->denormalize($serializer, $data['pricing_products']['pricing_product'], $format);
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

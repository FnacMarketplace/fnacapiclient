<?php
/*
 * This file is part of the fnacApi.
 * (c) 2017 Fnac
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FnacApiClient\Service\Response;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

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
    public function denormalize(DenormalizerInterface $denormalizer, $data, $format = null, array $context = array())
    {
        parent::denormalize($denormalizer, $data, $format);
        
        $this->pricing_products = new \ArrayObject();

        if (isset($data['pricing_products'])) {            
            $prices_array = $data['pricing_products']['pricing_product'];
            
            if(isset($prices_array['product_reference'])) {
                $tmpObj = new PricingProduct();
                $tmpObj->denormalize($denormalizer, $prices_array, $format);
                $this->pricing_products[] = $tmpObj;
            }
            else {
                foreach ($prices_array as $pricing_product) {
                    $tmpObj = new PricingProduct();
                    $tmpObj->denormalize($denormalizer, $pricing_product, $format);
                    $this->pricing_products[] = $tmpObj;
                }
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

<?php
/*
 * This file is part of the fnacMarketPlace APi Client.
 * (c) 2011 Fnac
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FnacApiClient\Entity;

use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizableInterface;

/**
 * OfferUpdate definition.
 *
 * @author     Fnac
 * @version    1.0.0
 */

class OfferUpdate extends Entity
{
    /** Get Var **/
    private $status;
    private $errors;
    private $product_fnac_id;
    private $offer_fnac_id;
    private $offer_seller_id;

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
        $this->product_fnac_id = isset($data['product_fnac_id']) ? $data['product_fnac_id'] : "";
        $this->offer_fnac_id = isset($data['offer_fnac_id']) ? $data['offer_fnac_id'] : "";
        $this->offer_seller_id = isset($data['offer_seller_id']) ? $data['offer_seller_id'] : "";

        $this->status = $data['@status'];

        $this->errors = new \ArrayObject();

        if (isset($data['error'])) {
            if (isset($data['error'][0])) {
                foreach ($data['error'] as $error) {
                    $tmpObj = new Error();
                    $tmpObj->denormalize($serializer, $error, $format);
                    $this->errors[] = $tmpObj;
                }
            } else {
                $tmpObj = new Error();
                $tmpObj->denormalize($serializer, $data['error'], $format);
                $this->errors[] = $tmpObj;
            }
        }
    }

    /**
     * Product's unique identifier from fnac
     *
     * @return string
     */
    public function getProductFnacId()
    {
        return $this->product_fnac_id;
    }

    /**
     * Offer's unique identifier from fnac
     *
     * @return string
     */
    public function getOfferFnacId()
    {
        return $this->offer_fnac_id;
    }

    /**
     * Offer's unique identifier from seller
     *
     * @return string
     */
    public function getOfferSellerId()
    {
        return $this->offer_seller_id;
    }

    /**
     * Status of offer update
     *
     * @see FnacApiClient\Type\ResponseStatusType
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Errors list when updating offer
     *
     * @see Error
     *
     * @return ArrayObject<Error>
     */
    public function getErrors()
    {
        return $this->errors;
    }
}

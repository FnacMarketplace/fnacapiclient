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
 * OfferQuery Offer query Service's definition.
 *
 * <pre>
 * {@code
 *  <?xml version="1.0" encoding="utf-8"?>
 *  &lt;offers_query results_count="10" partner_id="17B13D72-9938-9549-39B7-BC3FF73CDA84" shop_id="C591BE5B-C9E7-7123-BC78-98DCB9D7B4FB" token="DE5D25DE-888A-7A80-EF1D-85F01414CB75" xmlns="http://www.fnac.com/schemas/mp-dialog.xsd"&gt;
 *    &lt;paging&gt;1&lt;/paging&gt;
 *    &lt;quantity mode="Equals" value="10"/&gt;
 *    &lt;date type="Created"&gt;
 *      &lt;min&gt;2011-04-04T16:08:27+02:00&lt;/min&gt;
 *      &lt;max&gt;2011-04-04T16:08:27+02:00&lt;/max&gt;
 *    &lt;/date&gt;
 *    &lt;product_fnac_id&gt;1456277&lt;/product_fnac_id&gt;
 *    &lt;offer_fnac_id&gt;0E406634-71BF-909A-5CA4-A5BDD8AA2B8D&lt;/offer_fnac_id&gt;
 *    &lt;offer_seller_id&gt;8008601&lt;/offer_seller_id&gt;
 *  &lt;/offers_query&gt;
 * }
 * </pre>
 *
 * If the query is sucessfull, the service return :
 *
 *
 * Else :
 *
 *
 * @author     Fnac
 * @version    1.0.0
 */
class OfferQuery extends Query
{
    const XSD_FILE = "OffersQueryService.xsd";
    const ROOT_NAME = "offers_query";
    const CLASS_RESPONSE = "FnacApiClient\Service\Response\OfferQueryResponse";

    protected $offer_fnac_id = null;
    protected $product_fnac_id = null;
    protected $offer_seller_id = null;
    protected $quantity = null;
    protected $quantity_mode = null;
    protected $with_fees = null;

    /**
     * Set offer unique identifier from fnac
     *
     * @param string $offer_fnac_id Offer unique identifier
     * @return void
     */
    public function setOfferFnacId($offer_fnac_id)
    {
        $this->offer_fnac_id = $offer_fnac_id;
    }

    /**
     * Set product unique identifier from fnac
     *
     * @param string $product_fnac_id Product unique identifier
     * @return void
     */
    public function setProductFnacId($product_fnac_id)
    {
        $this->product_fnac_id = $product_fnac_id;
    }

    /**
     * Set offer unique identifier from seller
     *
     * @param string $offer_seller_id Offer unique identifier
     * @return void
     */
    public function setOfferSellerId($offer_seller_id)
    {
        $this->offer_seller_id = $offer_seller_id;
    }

    /**
     * Set offer's quantity
     *
     * @param string $quantity offer's quantity
     * @return void
     */
    public function setQuantity($quantity)
    {
        if (is_array($quantity) && array_key_exists('mode', $quantity)) {
            $this->quantity_mode = $quantity['mode'];
            $this->quantity = $quantity['value'];
        } else {
            $this->quantity_mode = "Equals";
            $this->quantity = $quantity;
        }
    }

    /**
     * Set fees displaying
     *
     * @param string $with_fees
     */
    public function setWithFees($with_fees)
    {
        $this->with_fees = $with_fees;
    }
    
    /**
     * {@inheritdoc}
     */
    public function __construct(array $offerQueryParameters = null)
    {
        if (!empty($offerQueryParameters)) {
            $this->initParameters($offerQueryParameters);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function normalize(SerializerInterface $serializer, $format = null)
    {
        $query = parent::normalize($serializer, $format);

        if (!is_null($this->offer_fnac_id)) {
            $query['offer_fnac_id'] = $this->offer_fnac_id;
        }

        if (!is_null($this->product_fnac_id)) {
            $query['product_fnac_id'] = $this->product_fnac_id;
        }

        if (!is_null($this->offer_seller_id)) {
            $query['offer_seller_id'] = $this->offer_seller_id;
        }

        if (!is_null($this->quantity) && !is_null($this->quantity_mode)) {
            $query['quantity'] = array(
                '@value' => $this->quantity, '@mode' => $this->quantity_mode
            );
        }

        if(!is_null($this->with_fees)) {
            $query['@with_fees'] = $this->with_fees;
        }

        return $query;
    }
}

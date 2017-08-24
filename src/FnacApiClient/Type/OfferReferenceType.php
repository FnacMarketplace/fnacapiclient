<?php
/*
 * This file is part of the fnacMarketPlace APi Client.
 * (c) 2011 Fnac
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FnacApiClient\Type;

/**
 * OfferReferenceType
 *
 * @author     Fnac
 * @version    1.0.0
 */
class OfferReferenceType extends AbstractType
{
    /**
     * Offer id created by fnac
     */
    const FNAC_ID = "FnacId";

    /**
     * Offer id created by seller
     */
    const SELLER_SKU = "SellerSku";

    protected static $validType = array(
        self::FNAC_ID, self::SELLER_SKU
    );
}

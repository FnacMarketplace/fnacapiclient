<?php
/*
 * This file is part of the fnacMarketPlace APi Client.
 * (c) 2017 Fnac
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FnacApiClient\Type;

/**
 * TriggerCartType
 *
 * @author     Fnac
 * @version    1.0.0
 */
class TriggerCartType extends AbstractType
{

    const MIN_SELLER_AMOUNT = "MinSellerAmount";
    const MIN_SELLER_QUANTITY = "MinSellerQuantity";
    const MIN_OFFER_QUANTITY = "MinOfferQuantity";


    protected static $validType = array(
        self::MIN_SELLER_AMOUNT,
        self::MIN_SELLER_QUANTITY,
        self::MIN_OFFER_QUANTITY
    );
}

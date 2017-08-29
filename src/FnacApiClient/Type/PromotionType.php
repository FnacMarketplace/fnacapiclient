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
 * PromotionType
 *
 * @author     Fnac
 * @version    1.0.0
 */
class PromotionType extends AbstractType
{

    const SALES = "Sales";
    const DESTOCKING = "Destocking";
    const GOODDEAL = "GoodDeal";
    const BATCH = "Batch";
    const FLASHSALE = "FlashSale";
    const FREESHIPPING = "FreeShipping";


    protected static $validType = array(
        self::SALES,
        self::DESTOCKING,
        self::GOODDEAL,
        self::BATCH,
        self::FLASHSALE,
        self::FREESHIPPING
    );
}

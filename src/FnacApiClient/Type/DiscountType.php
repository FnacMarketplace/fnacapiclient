<?php
/*
 * This file is part of the fnacMarketPlace API Client.
 * (c) 2017 Fnac
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FnacApiClient\Type;

/**
 * PricesType
 *
 * @author     Fnac
 * @version    1.0.0
 */
class DiscountType extends AbstractType
{

    const PERCENTAGE = "percentage";
    const FIXED = "fixed";
   
    
    protected static $validType = array(
        self::PERCENTAGE,
        self::FIXED
    );
}

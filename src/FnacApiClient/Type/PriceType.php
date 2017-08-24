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
class PriceType extends AbstractType
{
    /**
     * All price types
     */
    const ALL = "all";
    
    /**
     * Standard price, excluding Adhérents' (Fnac members) price
     */
    const STANDARD = "standard";
    
    /**
     * Adhérents' (Fnac members) only price type
     */
    const ADHERENT = "adherent";

    
    protected static $validType = array(
        self::ALL,
        self::STANDARD,
        self::ADHERENT
    );
}

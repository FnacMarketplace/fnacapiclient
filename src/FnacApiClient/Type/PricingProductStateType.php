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
 * PricingProductStateType
 *
 * @author     Fnac
 * @version    1.0.0
 */
class PricingProductStateType extends AbstractType
{
    /**
     * All states
     */
    const ALL = "all";
    
    /**
     * Product has never been used
     */
    const NEW_PRODUCT = "new";
    
    /**
     * Refurbished product
     */
    const REFURBISHED = "refurbished";

    /**
     * Used product, looks like new 
     */
    const USED_AS_NEW = "used-as-new";

    /**
     * Product used but in very good state
     */
    const USED_VERY_GOOD = "used-very-good";

    /**
     * Product used but in good state
     */
    const USED_GOOD = "used-good";

    /**
     * Product used
     */
    const USED_CORRECT = "used-correct";

    /**
     * Collection object used but looks like new
     */
    const COLLECTION_AS_NEW = "collection-as-new";

    /**
     * Collection object used but in very good state
     */
    const COLLECTION_VERY_GOOD = "collection-very-good";

    /**
     * Collection object used but in good state
     */
    const COLLECTION_GOOD = "collection-good";

    /**
     * Collection object used
     */
    const COLLECTION_CORRECT = "collection-correct";

    protected static $validType = array(
        self::ALL,
        self::NEW_PRODUCT,
        self::REFURBISHED,
        self::USED_AS_NEW,
        self::USED_VERY_GOOD,
        self::USED_GOOD,
        self::USED_CORRECT,
        self::COLLECTION_AS_NEW,
        self::COLLECTION_VERY_GOOD,
        self::COLLECTION_GOOD,
        self::COLLECTION_CORRECT
    );
}

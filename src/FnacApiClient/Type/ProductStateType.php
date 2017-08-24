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
 * ProductStateType
 *
 * @author     Fnac
 * @version    1.0.0
 */
class ProductStateType extends AbstractType
{
    /**
     * Product has never been used
     */
    const UNUSED = 11;

    /**
     * Refurbished product, looks like new
     */
    const USED_LIKE_UNUSED = 1;

    /**
     * Product used but in very good state
     */
    const USED_VERY_GOOD = 2;

    /**
     * Product used but in good state
     */
    const USED_GOOD = 3;

    /**
     * Product used
     */
    const USED_NORMAL = 4;

    /**
     * Uncommon product used but looks like new
     */
    const UNCOMMON_USED_LIKE_UNUSED = 5;

    /**
     * Uncommon product used but in very good state
     */
    const UNCOMMON_USED_VERY_GOOD = 6;

    /**
     * Uncommon product used but in good state
     */
    const UNCOMMON_USED_GOOD = 7;

    /**
     * Uncommon product used
     */
    const UNCOMMON_USED_NORMAL = 8;

    protected static $validType = array(
        self::UNUSED, self::USED_LIKE_UNUSED, self::USED_VERY_GOOD, self::USED_GOOD, self::USED_NORMAL, self::UNCOMMON_USED_LIKE_UNUSED, self::UNCOMMON_USED_VERY_GOOD, self::UNCOMMON_USED_GOOD, self::UNCOMMON_USED_NORMAL
    );
}

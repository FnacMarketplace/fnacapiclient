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
 * CompareType
 *
 * @author     Fnac
 * @version    1.0.0
 */
class CompareType extends AbstractType
{
    /**
     * Equals comparison a == b
     */
    const EQUALS = "Equals";

    /**
     * Less than comparison a < b
     */
    const LESS_THAN = "LessThan";

    /**
     * Greater than comparison a > b
     */
    const GREATER_THAN = "GreaterThan";

    /**
     * Less than or equals comparison a <= b
     */
    const LESS_THAN_OR_EQUALS = "LessThanOrEquals";

    /**
     * Greater than or equals comparison a >= b
     */
    const GREATER_THAN_OR_EQUALS = "GreaterThanOrEquals";

    /**
     * Default comparison type
     */
    const DEFAULT_COMPARISON = self::EQUALS;

    protected static $validType = array(
        self::EQUALS, self::LESS_THAN, self::GREATER_THAN, self::LESS_THAN_OR_EQUALS, self::GREATER_THAN_OR_EQUALS,
    );
}

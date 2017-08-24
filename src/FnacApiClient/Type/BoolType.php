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
 * BoolType
 *
 * @author     Fnac
 * @version    1.0.0
 */
class BoolType extends AbstractType
{
    /**
     * Set value to be true
     */
    const TRUE = "TRUE";

    /**
     * Set value to be false
     */
    const FALSE = "FALSE";

    protected static $validType = array(
        self::TRUE, self::FALSE
    );
}

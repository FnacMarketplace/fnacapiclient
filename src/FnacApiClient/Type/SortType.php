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
 * SortType
 *
 * @author     Fnac
 * @version    1.0.0
 */
class SortType extends AbstractType
{
    /**
     * Sort by create date
     */
    const CREATED_AT = "CREATED_AT";

    /**
     * Sort by update date
     */
    const UPDATED_AT = "UPDATED_AT";

    protected static $validType = array(
        self::CREATED_AT, self::UPDATED_AT
    );
}

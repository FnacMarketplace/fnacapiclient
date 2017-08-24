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
 * DateType
 *
 * @author     Fnac
 * @version    1.0.0
 */
class DateType extends AbstractType
{
    /**
     * Create date type
     */
    const CREATED_AT = "CreatedAt";

    /**
     * Update date type
     */
    const UPDATED_AT = "UpdatedAt";

    protected static $validType = array(
        self::CREATED_AT, self::UPDATED_AT
    );
}

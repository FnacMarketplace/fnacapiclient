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
 * SortOrderType
 *
 * @author     Fnac
 * @version    1.0.0
 */
class SortOrderType extends AbstractType
{
    /**
     * Sort in ascending order
     */
    const ASC = "ASC";

    /**
     * Sort in descending order
     */
    const DESC = "DESC";

    protected static $validType = array(
        self::DESC, self::ASC
    );
}

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
 * OrderDetailActionType
 *
 * @author     Fnac
 * @version    1.0.0
 */
class OrderDetailActionType extends AbstractType
{
    /**
     * Order detail has been accepted by seller
     */
    const ACCEPTED = "Accepted";

    /**
     * Order detail has been refused by seller
     */
    const REFUSED = "Refused";

    /**
     * Order detail has been shipped by seller
     */
    const SHIPPED = "Shipped";

    /**
     * Order detail has been updated by seller
     */
    const UPDATED = "Updated";

    /**
     * Order detail hase been refunded by seller
     */
    const REFUNDED = "Refunded";

    protected static $validType = array(
        self::ACCEPTED, self::REFUSED, self::SHIPPED, self::UPDATED, self::REFUNDED
    );
}

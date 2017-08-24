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
 * OrderStateType
 *
 * @author     Fnac
 * @version    1.0.0
 */
class OrderStateType extends AbstractType
{
    /**
     * Order has been created by client and wait to be accepted
     */
    const CREATED = "Created";

    /**
     * Order has been accepted by seller
     */
    const ACCEPTED = "Accepted";

    /**
     * All order details inside the order has been refused by seller
     */
    const REFUSED = "Refused";

    /**
     * Client has been debited and is waiting for his order
     */
    const TO_SHIP = "ToShip";

    /**
     * Seller has send order
     */
    const SHIPPED = "Shipped";

    /**
     * Client does not received order
     */
    const NOT_RECEIVED = "NotReceived";

    /**
     * Client received order
     */
    const RECEIVED = "Received";

    /**
     * Seller refunded client
     */
    const REFUNDED = "Refunded";

    /**
     * Client cancelled his order
     */
    const CANCELLED = "Cancelled";

    protected static $validType = array(
        self::CREATED, self::ACCEPTED, self::REFUSED, self::TO_SHIP, self::SHIPPED, self::NOT_RECEIVED, self::RECEIVED, self::REFUNDED, self::CANCELLED
    );
}

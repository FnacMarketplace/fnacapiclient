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
 * OrderDetailStateType
 *
 * @author     Fnac
 * @version    1.0.0
 */
class OrderDetailStateType extends AbstractType
{
    /**
     * The order line is waiting for approval from the seller
     * @var string
     */
    const TO_ACCEPT = "ToAccept";

    /**
     * The order line has been approved by the seller and is waiting for billing and payment
     * @var string
     */
    const ACCEPTED = "Accepted";

    /**
     * The order line has been completely refused by the seller (terminal state)
     * @var string
     */
    const REFUSED = "Refused";

    /**
     * The order line has been approved by the seller and billed, and is waiting for shipment by the seller
     * @var string
     */
    const TO_SHIP = "ToShip";

    /**
     * The order line has been approved by the seller, billed and shipped, and is waiting for aknowledgement by the customer
     * @var string
     */
    const SHIPPED = "Shipped";

    /**
     * The customer claimed that some or all products have not been received. This case will be managed by the customer service
     * @var string
     */
    const NOT_RECEIVED = "NotReceived";

    /**
     * The order line is finished, the customer received all the products and acknowledged reception (terminal state)
     * @var string
     */
    const RECEIVED = "Received";

    /**
     * The order line has been refund by the seller (terminal state)
     * @var string
     */
    const REFUNDED = "Refunded";

    /**
     * The order line has been cancelled by the customer (terminal state)
     * @var string
     */
    const CANCELLED = "Cancelled";

    protected static $validType = array(
        self::TO_ACCEPT, self::ACCEPTED, self::REFUSED, self::TO_SHIP, self::SHIPPED, self::NOT_RECEIVED, self::RECEIVED, self::REFUNDED, self::CANCELLED
    );
}

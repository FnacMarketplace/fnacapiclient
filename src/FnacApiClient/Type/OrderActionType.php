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
 * Group action type for order. Each of this group action define actions we can set for order details.
 *
 * @author     Fnac
 * @version    1.0.0
 */
class OrderActionType extends AbstractType
{
    /**
     * Actions related to accept or refused order detail
     */
    const ACCEPT_ORDER = "accept_order";

    /**
     * Actions related to confirm shipping order detail
     */
    const CONFIRM_TO_SEND = "confirm_to_send";

    /**
     * Actions related to refund order detail
     */
    const REFUND_ORDER = "refund_order";

    /**
     * Actions related to update order detail
     */
    const UPDATE = "update";

    /**
     * Massive actions related to accept or refused orders
     */
    const ACCEPT_ALL_ORDERS = "accept_all_orders";

    /**
     * Massive actions related to confirm shipping
     */
    const CONFIRM_ALL_TO_SEND = "confirm_all_to_send";

    /**
     * Massive actions related to update order details
     */
    const UPDATE_ALL = "update_all";

    protected static $validType = array(
        self::ACCEPT_ORDER, self::CONFIRM_TO_SEND, self::REFUND_ORDER, self::UPDATE, self::ACCEPT_ALL_ORDERS, self::CONFIRM_ALL_TO_SEND, self::UPDATE_ALL
    );
}

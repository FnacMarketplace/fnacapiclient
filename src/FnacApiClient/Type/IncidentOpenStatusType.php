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
 * IncidentOpenStatusType
 *
 * @author     Fnac
 * @version    1.0.0
 */
class IncidentOpenStatusType extends AbstractType
{
    /**
     * No incident
     */
    const NO_INCIDENT = 0;

    /**
     * Item not received by client
     */
    const ARTICLE_NOT_RECEIVED = 1;

    /**
     * Product inconsistent with his description
     */
    const INCONSISTENT_WITH_ITEM = 2;

    /**
     * Defective item
     */
    const DEFECTIVE_ITEM = 3;

    /**
     * Client want to retract his order
     */
    const RECTRACTION = 4;

    /**
     * Forged item
     */
    const INFRIGING_ITEM = 5;

    /**
     * Other open status type for client
     */
    const CLIENT_OTHERS = 6;

    /**
     * Refund
     */
    const REFUND = 7;

    /**
     * No stock on seller
     */
    const NO_STOCK = 8;

    /**
     * Returned to seller by client
     */
    const RETURNED_BY_CLIENT = 9;

    /**
     * Cancelled by client
     */
    const CANCEL_BY_CLIENT = 10;

    /**
     * Impossible to ship product at client address
     */
    const SHIPPING_IMPOSSIBLE = 11;

    /**
     * Item not received by client
     */
    const ITEM_NOT_RECEIVED = 12;

    /**
     * Faulty item
     */
    const ITEM_FAULTY = 13;

    /**
     * Item not corresponding to description
     */
    const ITEM_UNLIKE_DESCRIPTION = 14;

    /**
     * Other open status for seller
     */
    const SELLER_OTHERS = 15;

    /**
     * Shiiping longer than planned
     */
    const LONGER_PERIOD = 16;

    protected static $validType = array(
        self::NO_INCIDENT, self::ARTICLE_NOT_RECEIVED, self::INCONSISTENT_WITH_ITEM, self::DEFECTIVE_ITEM, self::RECTRACTION, self::INFRIGING_ITEM, self::CLIENT_OTHERS, self::REFUND, self::NO_STOCK, self::RETURNED_BY_CLIENT, self::CANCEL_BY_CLIENT, self::SHIPPING_IMPOSSIBLE, self::ITEM_NOT_RECEIVED, self::ITEM_FAULTY, self::ITEM_UNLIKE_DESCRIPTION, self::SELLER_OTHERS, self::LONGER_PERIOD
    );
}

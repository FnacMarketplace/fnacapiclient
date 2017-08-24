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
 * IncidentCloseStatusType
 *
 * @author     Fnac
 * @version    1.0.0
 */
class IncidentCloseStatusType extends AbstractType
{
    /**
     * Item resend to seller
     */
    const ITEM_RESEND_TO_THE_SELLER = 1;

    /**
     * Item refund with check
     */
    const REFUND_BY_CHECK = 2;

    /**
     * Aggreement between seller and client
     */
    const SELLER_AGGREEMENT = 3;

    /**
     * Item finally received by client
     */
    const RECEIVED_ITEM = 4;

    /**
     * Item is finally in good state
     */
    const GOOD_ITEM = 5;

    /**
     * Item not received by client
     */
    const ITEM_NOT_RECEIVED = 6;

    /**
     * Faulty iteam
     */
    const ITEM_FAULTY = 7;

    /**
     * Item not like description
     */
    const ITEM_UNLIKE_DESCRIPTION = 8;

    /**
     * No answer from client
     */
    const CLIENT_DONT_ANSWER = 9;

    /**
     * Item refund
     */
    const REFUND = 10;

    /**
     * Other close state
     */
    const OTHERS = 11;

    /**
     * Aggreement with fnac
     */
    const FNAC_AGGREEMENT = 12;

    /**
     * No answer from seller
     */
    const NO_ANSWER = 13;

    /**
     * Nothing happen for some times
     */
    const NO_NEWS = 14;

    /**
     * Seller stock empty for product
     */
    const NO_STOCK = 15;

    /**
     * Item returned to seller
     */
    const RETURNED_ITEM = 16;

    /**
     * Item cancelled by client
     */
    const CANCELED_ITEM = 17;

    /**
     * Impossible to send item to client
     */
    const IMPOSSIBLE_SEND = 18;

    /**
     * Item cancelled by client after send
     */
    const RETRACTATION = 19;

    /**
     * Forged item
     */
    const COUNTREFEIT = 20;

    /**
     * Shipping longer than planned
     */
    const LONGER_PERIOD = 21;

    /**
     * Incident managed by seller
     */
    const SELLER_SAV = 22;

    protected static $validType = array(
        self::ITEM_RESEND_TO_THE_SELLER, self::REFUND_BY_CHECK, self::SELLER_AGGREEMENT, self::RECEIVED_ITEM, self::GOOT_ITEM, self::ITEM_NOT_RECEIVED, self::ITEM_FAULTY, self::ITEM_UNLIKE_DESCRIPTION, self::CLIENT_DONT_ANSWER, self::REFUND, self::OTHERS, self::SOLUCE_FNAC, self::NO_ANSWER, self::NO_NEWS, self::NO_STOCK, self::RETURNED_ITEM, self::CANCELED_ITEM, self::IMPOSSIBLE_SEND, self::RETRACTATION, self::COUNTREFEIT, self::LONGER_PERIOD, self::SELLER_SAV
    );
}

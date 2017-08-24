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
 * MessageSubjectType
 *
 * @author     Fnac
 * @version    1.0.0
 */
class MessageSubjectType extends AbstractType
{
    /**
     * Message is about product
     */
    const PRODUCT_INFORMATION = "product_information";

    /**
     * Message is about shipping
     */
    const SHIPPING_INFORMATION = "shipping_information";

    /**
     * Message is about order
     */
    const ORDER_INFORMATION = "order_information";

    /**
     * Message is about a problem on offer
     */
    const OFFER_PROBLEM = "offer_problem";

    /**
     * Message when an offer has not been received by client
     */
    const OFFER_NOT_RECEIVED = "offer_not_received";

    /**
     * Other message subject type
     */
    const OTHER_QUESTION = "other_question";

    protected static $validType = array(
        self::PRODUCT_INFORMATION, self::SHIPPING_INFORMATION, self::ORDER_INFORMATION, self::OFFER_PROBLEM, self::OFFER_NOT_RECEIVED, self::OTHER_QUESTION
    );
}

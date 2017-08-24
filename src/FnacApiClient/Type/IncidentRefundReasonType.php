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
 * IncidentRefundReasonStateType
 *
 * Represents the different reasons for refunding a product
 *
 * @author     Fnac
 * @version    1.0.0
 */
class IncidentRefundReasonType extends AbstractType
{

    /**
     * @var string Other reason that listed below
     */
    const OTHER = "other";

    /**
     * @var string counterfeit
     */
    const COUNTERFEIT = "counterfeit";

    /**
     * @var string retraction
     */
    const RETRACTION = "retraction";

    /**
     * @var string Order cancelled by seller
     */
    const CANCELLED_CLIENT = "cancelled_client";

    /**
     * @var string Article does not match its description.
     */
    const UNMATCH_ARTICLE = "unmatch_article";

    /**
     * @var string Article was damaged when received by the client
     */
    const DAMAGED_ARTICLE = "damaged_article";

    /**
     * @var string Article is not received by the client
     */
    const UNRECEIVED_ARTICLE = "unreceived_article";

    /**
     * @var string Article was returned by the client
     */
    const RETURNED_ARTICLE = "returned_article";

    /**
     * @var string The product is no longer in stock with the seller
     */
    const NO_STOCK = "no_stock";

    /**
     * @var string Unable to send the product
     */
    const SHIPPING_IMPOSSIBLE = "shipping_impossible";

    protected static $validType = array(
        self::OTHER, self::COUNTERFEIT, self::RETRACTION, self::CANCELLED_CLIENT, self::UNMATCH_ARTICLE, self::DAMAGED_ARTICLE, self::UNRECEIVED_ARTICLE, self::RETURNED_ARTICLE, self::NO_STOCK, self::SHIPPING_IMPOSSIBLE,
    );
}

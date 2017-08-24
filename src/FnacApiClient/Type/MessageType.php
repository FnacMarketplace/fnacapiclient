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
 * MessageType
 *
 * @author     Fnac
 * @version    1.0.0
 */
class MessageType extends AbstractType
{
    /**
     * Message on a order
     */
    const ORDER = "ORDER";

    /**
     * Message on a offer
     */
    const OFFER = "OFFER";

    protected static $validType = array(
        self::ORDER, self::OFFER
    );
}

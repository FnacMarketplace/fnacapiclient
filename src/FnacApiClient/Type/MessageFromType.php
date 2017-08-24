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
 * MessageFromType
 *
 * @author     Fnac
 * @version    1.0.0
 */
class MessageFromType extends AbstractType
{
    /**
     * Message created by call center
     */
    const CALLCENTER = "CALLCENTER";

    /**
     * Message created by client
     */
    const CLIENT = "CLIENT";

    /**
     * Message created by seller
     */
    const SELLER = "SELLER";

    protected static $validType = array(
        self::CALLCENTER, self::CLIENT, self::SELLER
    );
}

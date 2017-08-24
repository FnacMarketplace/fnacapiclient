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
 * MessageToType
 *
 * @author     Fnac
 * @version    1.0.0
 */
class MessageToType extends AbstractType
{
    /**
     * Reply to call center
     */
    const CALLCENTER = "CALLCENTER";

    /**
     * Reply to client
     */
    const CLIENT = "CLIENT";

    /**
     * Reply to both client and call center
     */
    const ALL = "ALL";

    protected static $validType = array(
        self::CALLCENTER, self::CLIENT, self::ALL
    );
}

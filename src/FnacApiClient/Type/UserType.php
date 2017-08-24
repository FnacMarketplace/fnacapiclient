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
 * UserType
 *
 * @author     Fnac
 * @version    1.0.0
 */
class UserType extends AbstractType
{

    /**
     * Incident created by call center
     */
    const CALL_CENTER = "CALLCENTER";

    /**
     * Incident created by seller
     */
    const SELLER = "SELLER";

    /**
     * Incident created by client
     */
    const CLIENT = "CLIENT";

    /**
     * Incident created by system
     */
    const SYSTEM = "SYSTEM";

    protected static $validType = array(
        self::CALL_CENTER, self::SELLER, self::CLIENT, self::SYSTEM
    );
}

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
 * MessageStateType
 *
 * @author     Fnac
 * @version    1.0.0
 */
class MessageStateType extends AbstractType
{
    /**
     * Message read
     */
    const READ = "READ";

    /**
     * Message unread
     */
    const UNREAD = "UNREAD";

    protected static $validType = array(
        self::READ, self::UNREAD
    );
}

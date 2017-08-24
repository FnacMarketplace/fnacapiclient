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
 * MessageActionType
 *
 * @author     Fnac
 * @version    1.0.0
 */
class MessageActionType extends AbstractType
{
    /**
     * Mark message as read by seller
     */
    const MARK_AS_READ = "mark_as_read";

    /**
     * Mark message as unread by seller
     */
    const MARK_AS_UNREAD = "mark_as_unread";

    /**
     * Mark message as read and archive it
     */
    const MARK_AS_READ_AND_ARCHIVE = "mark_as_read_and_archive";

    /**
     * Archive message
     */
    const ARCHIVE = "archive";

    /**
     * Reply to message
     */
    const REPLY = "reply";

    /**
     * Create a message
     */
    const CREATE = "create";
    
    protected static $validType = array(
        self::MARK_AS_READ, self::MARK_AS_UNREAD, self::MARK_AS_READ_AND_ARCHIVE, self::ARCHIVE, self::REPLY, self::CREATE
    );
}

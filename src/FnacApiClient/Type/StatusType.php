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
 * StatusType
 *
 * @author     Fnac
 * @version    1.0.0
 */
class StatusType extends AbstractType
{
    /**
     * Incident is open
     */
    const OPENED = "OPENED";

    /**
     * Incident is close
     */
    const CLOSED = "CLOSED";

    protected static $validType = array(
        self::OPENED, self::CLOSED
    );
}

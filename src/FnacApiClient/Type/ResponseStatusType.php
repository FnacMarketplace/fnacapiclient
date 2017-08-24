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
 * ResponseStatusType
 *
 * @author     Fnac
 * @version    1.0.0
 */
class ResponseStatusType extends AbstractType
{
    /**
     * Batch is running
     */
    const RUNNING = "RUNNING";

    /**
     * Everything was OK
     */
    const OK = "OK";

    /**
     * Everything was OK but you need to pay attention for something
     */
    const WARNING = "WARNING";

    /**
     * Errors happens during request
     */
    const ERROR = "ERROR";

    /**
     * Fatal process happen, if this happen too many times call us
     */
    const FATAL = "FATAL";

    protected static $validType = array(
        self::RUNNING, self::OK, self::WARNING, self::ERROR, self::FATAL
    );
}


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
class IncidentUpdateActionType extends AbstractType
{
    /**
     * Refund order with or without Incident
     */
    const REFUND = "refund";

    protected static $validType = array(
        self::REFUND,
    );
}

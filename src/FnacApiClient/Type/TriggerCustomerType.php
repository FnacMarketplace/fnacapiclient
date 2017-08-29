<?php
/*
 * This file is part of the fnacMarketPlace APi Client.
 * (c) 2017 Fnac
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FnacApiClient\Type;

/**
 * TriggerCustomerType
 *
 * @author     Fnac
 * @version    1.0.0
 */
class TriggerCustomerType extends AbstractType
{

    const ALL = "all";
    const ADHERENT = "adherent";


    protected static $validType = array(
        self::ALL,
        self::ADHERENT
    );
}

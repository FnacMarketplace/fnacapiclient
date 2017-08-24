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
 * SellerType
 *
 * @author     Fnac
 * @version    1.0.0
 */
class SellerType extends AbstractType
{
    /**
     * All sellers account, yours included
     */
    const ALL = "all";

    /**
     * All sellers account, except yours
     */
    const OTHERS = "others";

    /**
     * All professional sellers only, including your account 
     */
    const ALL_PRO = "all-pro";

    /**
     * All professional sellers only, excluding your account 
     */
    const OTHERS_PRO = "others-pro";
    
    
    protected static $validType = array(
        self::ALL,
        self::OTHERS,
        self::ALL_PRO,
        self::OTHERS_PRO
    );
}

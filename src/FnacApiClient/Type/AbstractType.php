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
 * Base class for type
 *
 * @author     Fnac
 * @version    1.0.0
 */
abstract class AbstractType
{
    protected static $validType = array();

    /**
     * Determine if a type $type is valid for the class
     *
     * @param string $type
     * @return boolean
     */
    public static function isValid($type)
    {
        return (boolean) (in_array($type, static::$validType));
    }
}

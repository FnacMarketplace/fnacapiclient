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
 * OfferTreatmentType
 *
 * @author     Fnac
 * @version    1.0.0
 */
class OfferTreatmentType extends AbstractType
{
    /**
     * Delete the offer
     */
    const DELETED = "delete";

    protected static $validType = array(
        self::DELETED
    );
}

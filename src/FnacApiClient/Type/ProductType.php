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
 * ProductType
 *
 * @author     Fnac
 * @version    1.0.0
 */
class ProductType extends AbstractType
{
    /**
     * Product id type is EAN
     */
    const EAN = "Ean";

    /**
     * Product id type is ISBN
     */
    const ISBN = "Isbn";

    /**
     * Product unique identifier created by fnac
     */
    const ITEM_ID = "FnacId";

    /**
     * Product unique identifier created by partner
     */
    const PARTNER_ID = "PartnerId";

    protected static $validType = array(
        self::EAN, self::ISBN, self::ITEM_ID, self::PARTNER_ID
    );
}

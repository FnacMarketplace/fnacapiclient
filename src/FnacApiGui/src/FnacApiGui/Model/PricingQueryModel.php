<?php
/***
 *
 * This file is part of the fnacMarketPlace API Client GUI.
 * (c) 2014 Fnac
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * ---------------------------------
 * Fnac Api Gui : Orders query Model
 *
 * @desc Class used to retrieve Pricing query response
 * @author Somaninn Prok <sprok@fnac.com>
 *
 */

namespace FnacApiGui\Model;

use FnacApiClient\Entity\Pricing;
use FnacApiClient\Entity\PricingProduct;
use FnacApiClient\Entity\ProductReference;

use FnacApiClient\Service\Request\PricingQuery;

use FnacApiClient\Type\ProductStateType;
use FnacApiClient\Type\ProductType;
use FnacApiClient\Type\SellerType;

class PricingQueryModel extends Model
{

  public function __construct() {

    $this->template = __DIR__ ."/../templates/pricing_query.tpl.php";

    parent::__construct();
  }

  /**
   * Retrieves Orders query response
   *
   * @param SimpleClient $client
   * @param array $options Request parameters
   * @return ResponseService
   */
  public function retrievePricingResponse($client, $options = array())
  {
    $defaults = array(
        'seller_type' => SellerType::ALL
    );
    $options = array_merge($defaults, $options);
    extract($options);

    
    //Create a product reference
    $productRef = new ProductReference();
    $productRef->setType($product_type);    
    $productRef->setValue($product_reference);

    $pricingQuery = new PricingQuery();    
    $pricingQuery->setSellers($seller_type);
    $pricingQuery->addProductReference($productRef);
    
    $pricingQueryResponse = $client->callService($pricingQuery);

    $pricing_options = array();
    
    return $pricingQueryResponse->getPricingProducts($pricing_options);
  }

}


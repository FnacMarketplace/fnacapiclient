<?php
/***
 *  
 * This file is part of the fnacMarketPlace API Client GUI.
 * (c) 2014 Fnac
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * -------------------------------------
 * Fnac Api Gui : Pricing Query Component
 * 
 * @desc This page displays one product best available prices
 * 
 * @author Somaninn Prok <sprok@fnac.com>
 * 
 */

  require_once __DIR__.'/autoload.php';

  // Load required classes
  use FnacApiClient\Client\SimpleClient;
  use Symfony\Component\HttpFoundation\Request;
  
  use FnacApiGui\Controller\PricingController;
  use FnacApiGui\Model\PricingQueryModel;
  use FnacApiGui\View\PricingQueryView;
  use FnacApiClient\Type\ProductType;
  
  // Load client authentication parameters
  $client = new SimpleClient();
  $client->init(__DIR__.'/config/config.yml');
    
  $m = new PricingQueryModel();
  $c = new PricingController($m, $client);
  $v = new PricingQueryView($c, $m);
    
  $request = Request::createFromGlobals();
  $query   = $request->query; 
  
  if($query->get('product_reference') != null)
  {
    $product_reference = $query->get('product_reference');
    $query->set('product_reference', $product_reference);
    $query->set('product_type', ProductType::ITEM_ID);
  }
  
  // Retrieve orders query data
  $c->loadPricingData($query->all());
  
  echo $v->output($query);


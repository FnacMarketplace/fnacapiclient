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
 * Fnac Api Gui : Shop Invoices Query Component
 *
 * @desc This page displays invoices found on seller's account.
 *
 * @author Somaninn Prok
 *
 */

  require_once __DIR__.'/autoload.php';

  // Load required classes
  use FnacApiClient\Client\SimpleClient;
  use Symfony\Component\HttpFoundation\Request;

  use FnacApiGui\Controller\ShopInvoicesController;
  use FnacApiGui\Model\ShopInvoicesQueryModel;
  use FnacApiGui\View\ShopInvoicesQueryView;
  
  // Load client authentication parameters
  $client = new SimpleClient();
  $client->init(__DIR__.'/config/config.yml');

  $m = new ShopInvoicesQueryModel();
  $c = new ShopInvoicesController($m, $client);
  $v = new ShopInvoicesQueryView($c, $m);

  $request = Request::createFromGlobals();
  $query   = $request->query; 
  
  // Load all processed data
  $c->loadShopInvoicesData($query->all());

  echo $v->output($query->all());

?>

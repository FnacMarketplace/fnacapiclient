<?php
/***
 *  
 * This file is part of the fnacMarketPlace API Client GUI.
 * (c) 2013 Fnac
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * -------------------------------------
 * Fnac Api Gui : Orders Query Component
 * 
 * @desc This page displays the seller's received orders.
 * The seller can interact with orders by accepting, refusing them or marking them as shipped.
 * 
 * @author Somaninn Prok <sprok@fnac.com>
 * 
 */

  require_once __DIR__.'/autoload.php';

  // Load required classes
  use FnacApiClient\Client\SimpleClient;
  use Symfony\Component\HttpFoundation\Request;
  
  use FnacApiGui\Controller\OrdersController;
  use FnacApiGui\Model\OrdersQueryModel;
  use FnacApiGui\View\OrdersQueryView;
  
  // Load client authentication parameters
  $client = new SimpleClient();
  $client->init(__DIR__.'/config/config.yml');
    
  $m = new OrdersQueryModel();
  $c = new OrdersController($m, $client);
  $v = new OrdersQueryView($c, $m);
    
  $request = Request::createFromGlobals();
  $query   = $request->query; 
  
  // Retrieve orders against given order state
  if($query->get('state') != null)
  {
    $states = array();    
    $states []= $query->get('state');
    $query->set('states', $states);
  }
  
  // Execute action on order
  if($query->get('action') != null)
  {    
    $c->updateOrder($query);
  }
  
  // Retrieve orders query data
  $c->loadOrdersData($query->all());
  
  echo $v->output($query);

?>

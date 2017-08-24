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
 * Fnac Api Gui : Offers Query Component
 * 
 * @desc This page displays the seller's catalog.
 * The seller can interact with offers by updating the price or the quantity.
 * It is also possible to delete offers.
 * 
 * @author Somaninn Prok <sprok@fnac.com>
 * 
 */

  require_once __DIR__.'/autoload.php';

  // Load required classes
  use FnacApiClient\Client\SimpleClient;
  use Symfony\Component\HttpFoundation\Request;
  
  use FnacApiGui\Controller\OffersController;
  use FnacApiGui\Model\OffersQueryModel;
  use FnacApiGui\View\OffersQueryView;
  
  // Load client authentication parameters
  $client = new SimpleClient();
  $client->init(__DIR__.'/config/config.yml');
  
  $m = new OffersQueryModel();
  $c = new OffersController($m, $client);
  $v = new OffersQueryView($c, $m);
  
  $request = Request::createFromGlobals();
  $query   = $request->query;
  
  // Execute given action with required parameters
  if($query->get('action') != null)
  { 
    if($query->get('action') == 'update')
    {
      $c->updateOffer($query->all());
      $query->set('batch_id', $c->data->getBatchId());
    }
    elseif($query->get('action') == 'delete')
    {
      $c->deleteOffer($query->get('offer_sku'));
      $query->set('batch_id', $c->data->getBatchId());
    }    
  } 
  
  // Load all processed data
  $c->loadOffersData($query->all());
  
  echo $v->output($query);

?>

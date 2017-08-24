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
 * Fnac Api Gui : Incidents Query Component
 *
 * @desc This page displays incidents found on seller's orders.
 *
 * @author Armelle Lutz
 *
 */

  require_once __DIR__.'/autoload.php';

  // Load required classes
  use FnacApiClient\Client\SimpleClient;
  use Symfony\Component\HttpFoundation\Request;

  use FnacApiGui\Controller\IncidentsController;
  use FnacApiGui\Model\IncidentsQueryModel;
  use FnacApiGui\View\IncidentsQueryView;
  
  // Load client authentication parameters
  $client = new SimpleClient();
  $client->init(__DIR__.'/config/config.yml');

  $m = new IncidentsQueryModel();
  $c = new IncidentsController($m, $client);
  $v = new IncidentsQueryView($c, $m);

  $request = Request::createFromGlobals();
  $query   = $request->query; 
  
  // Load all processed data
  $c->loadIncidentsData($query->all());

  echo $v->output($query->all());

?>

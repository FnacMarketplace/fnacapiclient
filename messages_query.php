<?php
/***
 *
 * This file is part of the fnacMarketPlace API Client GUI.
 * (c) 2017 Fnac
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * -------------------------------------
 * Fnac Api Gui : Messages Query Component
 *
 * @desc This page displays messages on seller's orders or offers.
 *
 * @author Somaninn Prok
 *
 */

  require_once __DIR__.'/autoload.php';

  // Load required classes
  use FnacApiClient\Client\SimpleClient;
  use Symfony\Component\HttpFoundation\Request;

  use FnacApiGui\Controller\MessagesController;
  use FnacApiGui\Model\MessagesQueryModel;
  use FnacApiGui\View\MessagesQueryView;
  
  // Load client authentication parameters
  $client = new SimpleClient();
  $client->init(__DIR__.'/config/config.yml');

  $m = new MessagesQueryModel();
  $c = new MessagesController($m, $client);
  $v = new MessagesQueryView($c, $m);

  $request = Request::createFromGlobals();
  $query   = $request->query; 
  
  // Load all processed data
  $c->loadMessagesData($query->all());

  echo $v->output($query->all());

?>

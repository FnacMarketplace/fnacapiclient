<?php
/***
 *
 * This file is part of the fnacMarketPlace API Client GUI.
 * (c) 2013 Fnac
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * ------------------------------------
 * Fnac Api Gui : Batch Query Component
 *
 * @desc This page displays the current seller's offers update batches
 *
 * @author Somaninn Prok <sprok@fnac.com>
 *
 */

  require_once __DIR__.'/autoload.php';

  use FnacApiClient\Client\SimpleClient;
  use Symfony\Component\HttpFoundation\Request;

  use FnacApiGui\Controller\BatchController;
  use FnacApiGui\Model\BatchQueryModel;
  use FnacApiGui\View\BatchQueryView;

  $client = new SimpleClient();
  $client->init(__DIR__.'/config/config.yml');

  $m = new BatchQueryModel();
  $c = new BatchController($m, $client);
  $v = new BatchQueryView($c, $m);
  
  $request = Request::createFromGlobals();
  $query   = $request->query; 

  // Display batch details of a given batch_id
  if($query->get('batch_id') != null)
  {
    $c->loadBatchStatusData($query->get('batch_id'));
  }
  // Display currently running or enqueued (active) batches
  else
  {
    if($query->get('show_recent') != null)
    {
      $c->loadRecentBatchQueryData();
    }
    else {
      $c->loadBatchQueryData();
    }
  }

  echo $v->output();

?>

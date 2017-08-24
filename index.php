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
 * Fnac Api Client homepage
 *
 * @desc This page displays the seller account dashboard with some relevant figures.
 *
 * @author Somaninn Prok <sprok@fnac.com>
 *
 */

  require_once __DIR__.'/autoload.php';

  use FnacApiClient\Client\SimpleClient;

  use FnacApiGui\Controller\HomeController;
  use FnacApiGui\Model\HomeModel;
  use FnacApiGui\View\HomeView;

  $client = new SimpleClient();
  $client->init(__DIR__.'/config/config.yml');

  $m = new HomeModel();
  $c = new HomeController($m, $client);
  $v = new HomeView($c, $m);

  echo $v->output($client);

?>

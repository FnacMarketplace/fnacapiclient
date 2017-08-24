<?php
/***
 *
 * This file is part of the fnacMarketPlace API Client GUI.
 * (c) 2013 Fnac
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * -------------------------------
 * Fnac Api Gui : Homepage Controller
 *
 * @desc Class used to manage all retrieved data to display on homepage
 * @author Somaninn Prok <sprok@fnac.com>
 *
 */

namespace FnacApiGui\Controller;

use FnacApiGui\Model\OffersQueryModel;
use FnacApiGui\Model\OrdersQueryModel;
use FnacApiGui\Model\IncidentsQueryModel;
use FnacApiGui\Model\BatchQueryModel;

class HomeController extends Controller
{
  /**
   * Constructor.
   *
   * @param Model $model $model model class to use to manage wanted data
   * @param SimpleClient $client instanciated client to call services
   *
   */
  public function __construct($model, $client = null)
  {
    parent::__construct($model, $client);
  }

  /**
   * Checks connection to the API status
   *
   * @return null
   */
  public function checkConnection()
  {
    try
    {
      $this->client->checkAuth();
      $token = $this->client->getToken()->getToken();
    }
    catch(\Exception $e)
    {
      $token = null;
    }

    return $token;
  }

  /**
   * Loads all required data to display on homepage
   */
  public function loadHomeData()
  {
    $results = array();

    // Retrieve number of active offers
    $offerQuery = new OffersQueryModel();
    $offerQueryResponse = $offerQuery->retrieveOffersResponse($this->client, array('page' => 1, 'results_per_page' => 1));
    $results['nb_offers'] = $offerQueryResponse->getNbTotalResult();

    // Retrieve orders stats
    $newOrdersQuery = new OrdersQueryModel();
    $newOrdersQueryResponse = $newOrdersQuery->retrieveOrdersResponse($this->client, array('page' => 1, 'results_per_page' => 1, 'states' => array('Created')));
    $results['nb_new_orders'] = $newOrdersQueryResponse->getNbTotalResult();

    $toShipOrdersQuery = new OrdersQueryModel();
    $toShipOrdersResponse = $toShipOrdersQuery->retrieveOrdersResponse($this->client, array('page' => 1, 'results_per_page' => 1, 'states' => array('ToShip')));
    $results['nb_orders_to_ship'] = $toShipOrdersResponse->getNbTotalResult();

    $openedIncidents = new IncidentsQueryModel();
    $openedIncidentsResponse = $openedIncidents->retrieveIncidentsResponse($this->client, array('status' => 'OPENED'));
    $results['nb_opened_incidents'] = count($openedIncidentsResponse->getIncidents());

    $batchQuery = new BatchQueryModel();
    $batchQueryResponse = $batchQuery->retrieveBatchResponse($this->client);
    $results['nb_enqueued_batches'] = $batchQueryResponse->getNbBatchRunning() + $batchQueryResponse->getNbBatchActive();

    $this->data = $results;

  }

}
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
 * Fnac Api Gui : Homepage View
 *
 * @desc Class used to display orders query related data
 * @author Somaninn Prok <sprok@fnac.com>
 *
 */

namespace FnacApiGui\View;


class HomeView extends View
{
  /**
   * Constructor.
   *
   * @param Controller $controller controller to use for the view
   * @param Model $model $model model class to use to retrieve wanted data
   *
   */
  public function __construct($controller, $model)
  {
    parent::__construct($controller, $model);
  }

  /***
   * Retrieves data and display them into a dedicated template
   */
  public function output($client)
  {
    // Checking connection status
    $partner_id = $client->getPartnerId();
    $shop_id = $client->getShopId();
    $key = $client->getKey();
    $url = $client->getUri();

    $token = $this->controller->checkConnection();

    // If a token is successfully received, various data are fetched to be displayed on homepage
    if(isset($token))
    {
      $status = 'OK';
      $this->controller->loadHomeData();
      $data = $this->controller->getData();
      $nb_offers = $data['nb_offers'];
      $nb_new_orders = $data['nb_new_orders'];
      $nb_orders_to_ship = $data['nb_orders_to_ship'];
      $nb_enqueued_batches = $data['nb_enqueued_batches'];
      $nb_opened_incidents = $data['nb_opened_incidents'];
    }
    else
    {
      $status = 'NOK';
    }

    require_once($this->model->template);
  }

}
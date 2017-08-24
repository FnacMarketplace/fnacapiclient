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
 * Fnac Api Gui : Offers Controller
 * 
 * @desc Class used to manage orders related data
 * @author Somaninn Prok <sprok@fnac.com>
 * 
 */

namespace FnacApiGui\Controller;


class OrdersController extends Controller
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
   * Loads Orders query data in controller object
   * 
   * @param array $options Request parameters
   */
  public function loadOrdersData($options)
  {                    
    $this->data = $this->model->retrieveOrdersResponse($this->client, $options);
    
    $this->loadXmlData();
  }

  /**
   * Updates an order with given action
   * 
   * @param string $action
   * @param string $order_id
   */
  public function updateOrder($options)
  {
    $this->data = $this->model->updateOrder($this->client, $options->get('action'), $options->get('order_id'));
    
    $this->loadXmlUpdateData();
  }
}
<?php
/***
 *
 * This file is part of the fnacMarketPlace API Client GUI.
 * (c) 2014 Fnac
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * -------------------------------
 * Fnac Api Gui : Shop invoices Controller
 *
 * @desc Class used to manage incidents related data
 * @author Somaninn Prok
 *
 */

namespace FnacApiGui\Controller;


class ShopInvoicesController extends Controller
{
  /**
   * Constructor.
   *
   * @param Model $model model class to use to manage wanted data
   * @param SimpleClient $client instanciated client to call services
   *
   */
  public function __construct($model, $client = null)
  {
    parent::__construct($model, $client);
  }

  /**
   * Loads Shop Invoices query data in controller object
   *
   * @param array $options Request parameters
   */
  public function loadShopInvoicesData($options = array())
  {
    $this->data = $this->model->retrieveShopInvoicesResponse($this->client, $options);

    $this->loadXmlData();
  }

}
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
 * Fnac Api Gui : Incidents Controller
 *
 * @desc Class used to manage incidents related data
 * @author Armelle Lutz
 *
 */

namespace FnacApiGui\Controller;


class IncidentsController extends Controller
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
   * Loads Incidents query data in controller object
   *
   * @param array $options Request parameters
   */
  public function loadIncidentsData($options = array())
  {
    $this->data = $this->model->retrieveIncidentsResponse($this->client, $options);

    $this->loadXmlData();
  }

}
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
 * Fnac Api Gui : Incidents Query View
 *
 * @desc Class used to display incidents query related data
 * @author Armelle Lutz
 *
 */

namespace FnacApiGui\View;


class IncidentsQueryView extends View
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
  public function output($options = array())
  {
    $xml_update_request = null;   // Plain XML update request sent to the service, for education or debugging purpose
    $xml_update_response = null;  // Plain XML response received from the updating service, for education or debugging purpose

    // Retrieve data with controller
    $data = $this->controller->getData($options);

    $incidents = $data->getIncidents();

    $xml_request = self::xml_highlight($this->controller->getRequest(), true); // Plain XML request sent to the service, for education or debugging purpose
    $xml_response = self::xml_highlight($this->controller->getResponse());     // Plain XML response received from the service, for education or debugging purpose

    require_once($this->model->template);
  }

}
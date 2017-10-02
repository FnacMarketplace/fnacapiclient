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


class MessagesQueryView extends View
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

    $messages = $data->getMessages();
    $page = $data->getPage();                         // Page number
    $total_paging = $data->getTotalPaging();          // Total number of pages
    $nb_total_per_page = $data->getNbTotalPerPage();  // Number of messages per page
    $nb_total_result = $data->getNbTotalResult();     // Total number of messages
    
    $xml_request = self::xml_highlight($this->controller->getRequest(), true); // Plain XML request sent to the service, for education or debugging purpose
    $xml_response = self::xml_highlight($this->controller->getResponse());     // Plain XML response received from the service, for education or debugging purpose

    $pager_info = NULL;
    $pager_limit = NULL;
    $i = NULL;
    
    if($nb_total_result > 0)
    {
        $pager_info = $this->buildPager($page, $total_paging);
        $pager_limit = $pager_info['pager_limit'];
        $i = $pager_info['i'];
    }
    
    require_once($this->model->template);
  }

}
<?php
/***
 *  
 * This file is part of the fnacMarketPlace API Client GUI.
 * (c) 2013 Fnac
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * --------------------------------
 * Fnac Api Gui : Orders Query View
 * 
 * @desc Class used to display orders query related data
 * @author Somaninn Prok <sprok@fnac.com>
 * 
 */

namespace FnacApiGui\View;


class OrdersQueryView extends View
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
  public function output($options)
  { 
    $xml_update_request = null;   // Plain XML update request sent to the service, for education or debugging purpose
    $xml_update_response = null;  // Plain XML response received from the updating service, for education or debugging purpose
        
    // Execute order accept
    if($options->get('action') != null)
    {
      $order_id = $options->get('action');
      $xml_update_request  = self::xml_highlight($this->controller->getUpdateRequest(), true);
      $xml_update_response = self::xml_highlight($this->controller->getUpdateResponse(), true);
    }
    
    $state = null; // Default page retrieves all orders in any state
    
    if($options->get('states') != null)
    {
      $states = $options->get('states');
      $state = array_pop($states);
    }
    
    $data = $this->controller->data;
    
    $orders = $data->getOrders();                     // Orders objects list
    $page = $data->getPage();                         // Page number
    $total_paging = $data->getTotalPaging();          // Total number of pages
    $nb_total_per_page = $data->getNbTotalPerPage();  // Number of orders per page
    $nb_total_result = $data->getNbTotalResult();     // Total number of orders
    
    $min_order_number = $nb_total_per_page * ($page - 1) + 1;
    $max_order_number = $nb_total_per_page * ($page - 1) + count($orders);
    
    $xml_request  = self::xml_highlight($this->controller->getRequest(), true); // Plain XML request sent to the service, for education or debugging purpose
    $xml_response = self::xml_highlight($this->controller->getResponse());      // Plain XML response received from the service, for education or debugging purpose
    
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
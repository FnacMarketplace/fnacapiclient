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
 * Fnac Api Gui : Shop Invoices Query View
 *
 * @desc Class used to display incidents query related data
 * @author Somaninn Prok
 *
 */

namespace FnacApiGui\View;


class ShopInvoicesQueryView extends View
{
  /**
   * Constructor.
   *
   * @param Controller $controller controller to use for the view
   * @param Model $model model class to use to retrieve wanted data
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
    $xml_request = null;   // Plain XML update request sent to the service, for education or debugging purpose
    $xml_response = null;  // Plain XML response received from the updating service, for education or debugging purpose

    // Retrieve data with controller
    $data = $this->controller->getData($options);

    $shop_invoices = $data->getShopInvoices();
    $page = $data->getPage();                         // Page number
    $total_paging = $data->getTotalPaging();          // Total number of pages
    $nb_total_per_page = $data->getNbTotalPerPage();  // Number of offers per page
    $nb_total_result = $data->getNbTotalResult();     // Total number of offers
    
    $min_offer_number = $nb_total_per_page * ($page - 1) + 1;
    $max_offer_number = $nb_total_per_page * ($page - 1) + count($shop_invoices);

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
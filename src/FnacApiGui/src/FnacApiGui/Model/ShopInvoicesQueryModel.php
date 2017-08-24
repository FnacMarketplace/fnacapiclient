<?php
/***
 *
 * This file is part of the fnacMarketPlace API Client GUI.
 * (c) 2014 Fnac
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * --------------------------
 * Fnac Api Gui : Shop Invoice Model
 *
 * @desc Class used to retrieve Shop Invoice query response
 * @author Somaninn Prok
 *
 */

namespace FnacApiGui\Model;

// Load required classes
use FnacApiClient\Entity\ShopInvoice;
use FnacApiClient\Service\Request\ShopInvoiceQuery;

class ShopInvoicesQueryModel extends Model
{

  public function __construct()
  {
    $this->template = __DIR__ ."/../templates/shop_invoices_query.tpl.php"; // Set default template

    parent::__construct();
  }

  /**
   * Retrieves Shop Invoice query response
   *
   * @param SimpleClient $client
   * @return ResponseService
   */
  public function retrieveShopInvoicesResponse($client, $options = array())
  {
    $defaults = array(
        'page' => 1,
        'results_per_page' => 10,
    );
    
    $options = array_merge($defaults, $options);
    extract($options);

    $shopInvoiceQuery = new ShopInvoiceQuery();
    
    $shopInvoiceQuery->setPaging($page);
    $shopInvoiceQuery->setResultsCount($results_per_page);
    
    $shopInvoiceQueryResponse = $client->callService($shopInvoiceQuery);

    return $shopInvoiceQueryResponse;
  }

}


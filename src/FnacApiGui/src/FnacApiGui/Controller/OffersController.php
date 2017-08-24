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
 * @desc Class used to manage offers related data
 * @author Somaninn Prok <sprok@fnac.com>
 * 
 */

namespace FnacApiGui\Controller;


class OffersController extends Controller
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
   * Loads Offers query data in controller object
   * 
   * @param array $options Request parameters
   */
  public function loadOffersData($options = array())
  {                    
    $this->data = $this->model->retrieveOffersResponse($this->client, $options);
    
    $this->loadXmlData();
  }

  /**
   * Updates an offer with parameters
   * 
   * @param array $options
   */
  public function updateOffer($options)
  {
    $this->data = $this->model->updateOffer($this->client, $options);
    
    $this->loadXmlUpdateData();    
  }

  /**
   * Deletes an offer identified with its sku
   * 
   * @param string $sku
   */
  public function deleteOffer($offer_sku)
  {
    $this->data = $this->model->deleteOffer($this->client, $offer_sku);
    
    $this->loadXmlUpdateData();
  }       
}
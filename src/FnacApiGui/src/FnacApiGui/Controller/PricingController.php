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
 * Fnac Api Gui : Pricing Controller
 * 
 * @desc Class used to manage offers pricing related data
 * @author Somaninn Prok <sprok@fnac.com>
 * 
 */

namespace FnacApiGui\Controller;


class PricingController extends Controller
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
  public function loadPricingData($options)
  {
    $this->data = $this->model->retrievePricingResponse($this->client, $options);
  }

}
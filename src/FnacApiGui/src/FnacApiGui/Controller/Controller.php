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
 * Fnac Api Gui : Controller class
 * 
 * @desc Class used to execute action on model objects
 * @author Somaninn Prok <sprok@fnac.com>
 * 
 */

namespace FnacApiGui\Controller;


class Controller
{
    public $model;
    public $client;
        
    public $data;
    
    public $request;
    public $response;
    public $update_request;
    public $update_response;
    
    public function __construct($model, $client = null){
        $this->model = $model;
        $this->client = $client;
    }
    
    public function getClient() {
      return $this->client;
    }    
    
    public function getRequest()        
    {
      return $this->request;
    }
    
    public function getResponse()
    {
      return $this->response;
    }
    
    public function getUpdateRequest()
    {
      return $this->update_request;
    }

    public function getUpdateResponse()
    {
      return $this->update_response;
    }
    
    public function getData()
    {
      return $this->data;
    }
    
    public function loadXmlData()
    {      
      $this->request = $this->client->getXmlRequest();
      $this->response = $this->client->getXmlResponse();
    }
    
    public function loadXmlUpdateData()
    {      
      $this->update_request = $this->client->getXmlRequest();
      $this->update_response = $this->client->getXmlResponse();
    }
}
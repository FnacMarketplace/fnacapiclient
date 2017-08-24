<?php
/*
 * This file is part of the FnacApiClient.
 * (c) 2011 Fnac
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FnacApiClient\Client;


use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\CustomNormalizer;

use Zend\Http\Client as ZendClient;

use FnacApiClient\Service\Request\RequestService;
use FnacApiClient\Exception\ErrorResponseException;
use FnacApiClient\Configuration\Configuration;
use FnacApiClient\Service\Request\Authentified;
use FnacApiClient\Service\Request\Authentification;

/**
 * SimpleClient connect to Fnac REST WebServices using default object and configuration.
 *
 * You simply need to provide the following information in the constructor or on init function in a array or a file :
 *
 *  host : Uri of the Fnac REST WebServices<br />
 *  shop_id : Your shop unique identifier<br />
 *  partner_id : Your partner unique identifier<br />
 *  key : Your authentification key
 *
 * @author     Fnac
 * @version    1.0.0
 */
class SimpleClient extends Client
{

    private $shop_id;
    private $partner_id;
    private $key;

    private $token = null;

    /**
     * Create a new Client
     *
     * @param string $uri : Uri of fnac rest webservice
     * @param string $shop_id : Your shop unique identifier
     * @param string $partner_id : Your partner unique identifier
     * @param string $key : Your authentification key
     */
    public function __construct($uri = "", $shop_id = "", $partner_id = "", $key = "")
    {
        $this->uri = $uri;
        $this->shop_id = $shop_id;
        $this->partner_id = $partner_id;
        $this->key = $key;
        
        $serializer = new Serializer(array(new CustomNormalizer()), array(new XmlEncoder()));

        $zendClient = new ZendClient();

        parent::__construct($serializer, $zendClient);
    }

    /**
     * Init parameters of client
     *
     * You can give a yml filename (if don't give a absolute path the root dir for relative is the root directory of this lib)
     * Or an array with the different information inside :
     *
     * <pre>
     * Array (
     *  'host' => 'http://...'
     *  'shop_id' => 'Your shop unique identifier'
     *  'partner_id' => 'Your partner unique identifier'
     *  'key' => Your authentification key
     * )
     * </pre>
     *
     * @param mixed $parameters
     */
    public function init($parameters)
    {
        if (is_string($parameters)) {
            $config = new Configuration($parameters);
            $parameters = $config[Configuration::CLIENT_CONFIG];
        }

        $this->uri = isset($parameters['host']) ? $parameters['host'] : "";
        $this->shop_id = isset($parameters['shop_id']) ? $parameters['shop_id'] : "";
        $this->partner_id = isset($parameters['partner_id']) ? $parameters['partner_id'] : "";
        $this->key = isset($parameters['key']) ? $parameters['key'] : "";
    }

    /**
     * Call a service on fnac rest webservice
     *
     * @param Authentified $service : Service to call
     * @return FnacApiClient\Service\ResponseService
     */
    public function callService(RequestService $service, $checkXML = false)
    {
        try {
            $this->checkAuth();
            $service->initAuth($this->shop_id, $this->partner_id, $this->token->getToken());

            return parent::callService($service);
        }
        catch(\Exception $e) {
            throw $e;
        }
    }

    /**
     * Check if we are authentified to fnac rest webservice using Authentification Service
     *
     * @return boolean
     */
    public function checkAuth()
    {
      try {
        if ($this->token === null) {
          $this->token = parent::callService(new Authentification($this->shop_id, $this->partner_id, $this->key));
        }
        
        $i = 0;
        while (!$this->token->isValid()) {
          $this->token = parent::callService(new Authentification($this->shop_id, $this->partner_id, $this->key));
          $i++;
          if ($i > 50) {
            throw new \Exception("Error token unvalid for more than 50 times in a row, check if your system is at the right time");
          }
        }
      }
      catch (ErrorResponseException $e) {
        $this->token = null;
        throw $e;
      }
    }

  public function getShopId()
    {
      return $this->shop_id;
    }

    public function getPartnerId()
    {
      return $this->partner_id;
    }

    public function getKey()
    {
      return $this->key;
    }

    public function getToken()
    {
      return $this->token;
    }

}

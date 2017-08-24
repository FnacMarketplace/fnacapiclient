<?php
/*
 * This file is part of the fnacApi.
 * (c) 2011 Fnac
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FnacApiClient\Configuration;

use Symfony\Component\Yaml\Yaml;
use FnacApiClient\Exception\FileNotFoundException;

/**
 * Configuration hold the configuration for the Fnac API Services.
 * @see Fnac Documentation -> /documentation
 *
 * @author     Fnac
 * @version    1.0.0
 */
class Configuration implements \ArrayAccess
{
    CONST CLIENT_CONFIG = 'fnac_api_client';
    CONST HTTP_CLIENT = 'fnac_http_client';
    CONST SERVICE_CONFIG = 'fnac_api_services';

    /**
     * Configuration path
     *
     * @var string
     **/
    protected $config_path;

    /**
     * Unique Shop identifier
     *
     * @var string
     **/
    protected $shop_id;

    /**
     * Unique partner_id identifier
     *
     * @var boolean
     **/
    protected $partner_id;

    /**
     * key authentification
     *
     * @var string
     **/
    protected $api_key;

    /**
     * Yaml Configuration
     *
     * @var array
     **/
    protected $config;

    /**
     * Create a configuration given a specific file
     *
     * @param string $config_path The path of yml file to parse
     */
    public function __construct($config_path)
    {
        $this->config_path = $config_path;
        $this->config = Yaml::parse($this->config_path);

        if ($this->config === $this->config_path) {
            throw new FileNotFoundException(sprintf("The file at %s does not exist", $config_path));
        }

        $config_client = $this->config[self::CLIENT_CONFIG];

        /** we must have client_config **/
        if (empty($config_client) || empty($config_client['key']) || empty($config_client['shop_id']) || empty($config_client['partner_id']) || empty($config_client['host'])) {
            throw new \LogicException(sprintf("The file at %s does not contain any configuration element, please check your file.", $config_path));
        }

    }

    /**
     * {@inheritDoc}
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->config[] = $value;
        } else {
            $this->config[$offset] = $value;
        }
    }

    /**
     * {@inheritDoc}
     */
    public function offsetExists($offset)
    {
        return isset($this->config[$offset]);
    }

    /**
     * {@inheritDoc}
     */
    public function offsetUnset($offset)
    {
        unset($this->config[$offset]);
    }

    /**
     * {@inheritDoc}
     */
    public function offsetGet($offset)
    {
        return isset($this->config[$offset]) ? $this->config[$offset] : null;
    }
}

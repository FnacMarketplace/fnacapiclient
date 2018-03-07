<?php
/*
 * This file is part of the fnacApi.
 * (c) 2011 Fnac
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FnacApiClient\Service\Response;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;


/**
 * Token service base definition for response when using authentification.
 *
 * @author     Fnac
 * @version    1.0.0
 */
class Token extends ResponseService
{
    private $token = "";
    private $validity = "";

    /**
     * {@inheritdoc}
     */
    public function denormalize(DenormalizerInterface $denormalizer, $data, $format = null, array $context = array())
    {
        parent::denormalize($denormalizer, $data, $format);
        if(isset($data['token']))
        {
            $this->token = $data['token'];
            $this->validity = strtotime($data['validity']);
        }
    }

    /**
     * Token's value
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Token expiration date
     *
     * @return integer Unix Timestamp
     */
    public function getValidity()
    {
        return $this->validity;
    }

    /**
     * Is token still valid ?
     *
     * @return boolean
     */
    public function isValid()
    {
        $local_time_zone = date_default_timezone_get();
        
        ini_set("date.timezone", "UTC"); // force timezone to UTC for token validity to be timezone independent
        $isValid = (bool) (time() < $this->getValidity());
        ini_set("date.timezone", $local_time_zone);
        
        return $isValid;
    }
}

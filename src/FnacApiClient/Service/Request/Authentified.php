<?php
/*
 * This file is part of the fnacApi.
 * (c) 2011 Fnac
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FnacApiClient\Service\Request;

use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Authentified service base definition for authentified request.
 *
 * @author     Fnac
 * @version    1.0.0
 */
abstract class Authentified extends RequestService
{
    private $shop_id;
    private $partner_id;
    private $token;

    /**
     * Init authentification parameters
     *
     * @param string $shop_id : The shop uid
     * @param string $partner_id : The partner uid
     * @param string $token : A valid token
     */
    public function initAuth($shop_id, $partner_id, $token)
    {
        $this->shop_id = $shop_id;
        $this->partner_id = $partner_id;
        $this->token = $token;
    }

    /**
     * Return token for this session
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Shop unique identifier
     *
     * @return string
     */
    public function getShopId()
    {
        return $this->shop_id;
    }

    /**
     * Partner unique identifier
     *
     * @return string
     */
    public function getPartnerId()
    {
        return $this->partner_id;
    }

    /**
     * Set session token
     *
     * @param string $token : Token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * Set shop unique identifier
     *
     * @param string $shop_id : The shop uid
     */
    public function setShopId($shop_id)
    {
        $this->shop_id = $shop_id;
    }

    /**
     * Set partner unique identifier
     *
     * @param string $partner_id : The partner uid
     */
    public function setPartnerId($partner_id)
    {
        $this->partner_id = $partner_id;
    }

    /**
     * {@inheritdoc}
     */
    public function normalize(NormalizerInterface $normalizer, $format = null, array $context = array())
    {
        return array_merge(parent::normalize($normalizer, $format), array(
            '@shop_id' => $this->getShopId(), '@partner_id' => $this->getPartnerId(), '@token' => $this->getToken()
        ));
    }
}

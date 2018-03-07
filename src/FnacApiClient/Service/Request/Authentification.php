<?php
/*
 * This file is part of the fnacMarketPlace.
* (c) 2011 Fnac
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/
namespace FnacApiClient\Service\Request;

use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

/**
 * Authentification Authentification Service's definition.
 *
 * <?xml version='1.0' encoding='utf-8'?>
 * <auth xmlns='http://www.fnac.com/schemas/mp-dialog.xsd'>
 *    <partner_id>87B13D72-9938-9549-39B7-BC3FF73CDA84</partner_id>
 *    <shop_id>859A6B21-6916-58FB-8B71-88EAD9A6A1F0</shop_id>
 *    <key>880DF287-9C46-59FE-14F4-6CB717C967C9</key>
 * </auth>
 *
 * If the authentification is sucessfull, the service return :
 *
 * <auth_response status="OK" xmlns="http://www.fnac.com/schemas/mp-dialog.xsd">
 *    <token>61DF8A84-4465-7D36-20A4-00F941207026</token>
 *    <validity>2011-04-01T18:04:13+02:00</validity>
 * </auth_response>
 *
 * @author     Fnac
 * @version    1.0.0
 */
class Authentification extends RequestService
{

    const XSD_FILE = "AuthenticationService.xsd";
    const ROOT_NAME = "auth";
    const CLASS_RESPONSE = "FnacApiClient\Service\Response\Token";

    private $partnerId = 0;
    private $shopId = 0;
    private $key = "";

    /**
     * Build Auth Service
     *
     * @param string $partnerId : The partner Uid
     * @param string $shopId : The shop uid
     * @param string $key : The password key
     */
    public function __construct($shopId, $partnerId, $key)
    {
        $this->partnerId = $partnerId;
        $this->shopId = $shopId;
        $this->key = $key;
    }

    /**
     * Get shop id
     *
     * @return string
     */
    protected function getShopId()
    {
        return $this->shopId;
    }

    /**
     * Get partner id
     *
     * @return string
     */
    protected function getPartnerId()
    {
        return $this->partnerId;
    }

    /**
     * Get api key
     *
     * @return string
     */
    protected function getApiKey()
    {
        return $this->key;
    }

    /**
     * {@inheritdoc}
     */
    public function normalize(NormalizerInterface $normalizer, $format = null, array $context = array())
    {
        return array_merge(parent::normalize($normalizer, $format), array(
            'shop_id' => $this->getShopId(), 'partner_id' => $this->getPartnerId(), 'key' => $this->getApiKey()
        ));
    }
    
}

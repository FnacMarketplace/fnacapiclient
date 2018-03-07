<?php
/*
 * This file is part of the fnacMarketPlace APi Client.
 * (c) 2011 Fnac
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FnacApiClient\Service\Request;

use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use FnacApiClient\Entity\Offer;

/**
 * OfferUpdate Service's definition.
 *
 * @author     Fnac
 * @version    1.0.0
 */

class OfferUpdate extends Authentified
{
    const ROOT_NAME = "offers_update";
    const XSD_FILE = "OffersUpdateService.xsd";
    const CLASS_RESPONSE = "FnacApiClient\Service\Response\OfferUpdateResponse";

    private $offers = array();

    /**
     * {@inheritdoc}
     */
    public function __construct(array $parameters = null)
    {
        parent::__construct($parameters);

        $this->offers = new \ArrayObject();
    }

    /**
     * {@inheritdoc}
     */
    public function normalize(NormalizerInterface $normalizer, $format = null, array $context = array())
    {
        $data = parent::normalize($normalizer, $format);

        $data['offer'] = array();

        if ($this->offers->count() > 1) {
            foreach ($this->offers as $offer) {
                $data['offer'][] = $offer->normalize($normalizer, $format);
            }
        } elseif ($this->offers->count()) {
            $data['offer'] = $this->offers[0]->normalize($normalizer, $format);
        }

        return $data;
    }

    /**
     * Add offer to service
     *
     * @param Offer $offer Offer to update
     */
    public function addOffer(Offer $offer)
    {
        $this->offers[] = $offer;
    }
}

<?php
/***
 *  
 * This file is part of the fnacMarketPlace API Client GUI.
 * (c) 2013 Fnac
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * ---------------------------------
 * Fnac Api Gui : Offers query Model
 * 
 * @desc Class used to retrieve Batch query response
 * @author Somaninn Prok <sprok@fnac.com>
 * 
 */

namespace FnacApiGui\Model;

use FnacApiClient\Entity\Offer;
use FnacApiClient\Service\Request\OfferQuery;
use FnacApiClient\Service\Request\OfferUpdate;
use FnacApiClient\Type\OfferReferenceType;

class OffersQueryModel extends Model
{ 
  
  public function __construct() {
    
    $this->template = __DIR__ ."/../templates/offers_query.tpl.php";
      
    parent::__construct();
  }
  
  /**
   * Retrieves Offers query response
   * 
   * @param SimpleClient $client
   * @param array $options Request parameters
   * @return ResponseService
   */
  public function retrieveOffersResponse($client, $options = array())
  {    
    $defaults = array(
        'page' => 1,
        'results_per_page' => 10,
    );
    $options = array_merge($defaults, $options);
    extract($options);
    
    $offerQuery = new OfferQuery();
    
    $offerQuery->setPaging($page);
    $offerQuery->setResultsCount($results_per_page);

    $offerQueryResponse = $client->callService($offerQuery);
    
    return $offerQueryResponse;
  }
  
  /**
   * Update the quantity and the price an offer by its sku
   * 
   * @param SimpleClient $client
   * @param array $options
   * @return ResponseService
   */
  public function updateOffer($client, $options)
  {    
    extract($options);
   
    $offer = new Offer();
    $offer->setOfferReferenceType(OfferReferenceType::SELLER_SKU);
    $offer->setOfferReference($offer_sku);
    $offer->setQuantity($quantity);
    $offer->setPrice($price);
    $offer->setDescription($description);

    $offerUpdate = new OfferUpdate();
    $offerUpdate->addOffer($offer);

    //Call the service
    $offerUpdateResponse = $client->callService($offerUpdate);
        
    return $offerUpdateResponse;
  }
  
  /**
   * Delete an offer selected by its sku
   * 
   * @param SimpleClient $client
   * @param string $sku
   * @return ResponseService
   */
  public function deleteOffer($client, $sku)
  {
    $offer = new Offer();
    $offer->setOfferReferenceType(OfferReferenceType::SELLER_SKU);
    $offer->setOfferReference($sku);
    $offer->setTreatment('delete');

    $offerUpdate = new OfferUpdate();
    $offerUpdate->addOffer($offer);

    //Call the service
    $offerUpdateResponse = $client->callService($offerUpdate);
    
    return $offerUpdateResponse;
  }
  
}


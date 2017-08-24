<?php

    $pricings = $data->offsetGet(0)->getPricings();
      
    function getStateLabel($state_id)
    {
          $states_label = array(
            FnacApiClient\Entity\Offer::STATE_USED_AS_NEW => "Used as new",
            FnacApiClient\Entity\Offer::STATE_USED_VERY_GOOD => "Used, very good state",
            FnacApiClient\Entity\Offer::STATE_USED_GOOD => "Used, good state",
            FnacApiClient\Entity\Offer::STATE_USED_CORRECT => "Used, correct state",
            FnacApiClient\Entity\Offer::STATE_REFURBISHED => "Refurbished",
            FnacApiClient\Entity\Offer::STATE_NEW => "New"
          );

          return $states_label[$state_id];
    }
    
    // Partner using Pricing V1 API
    if($data->offsetGet(0)->getPricings() instanceof ArrayObject)
    {
        foreach($pricings as $pricing)
        {
            echo "<em>". getStateLabel($pricing->getOfferStatus()) .'</em><br /> ' . number_format($pricing->getPrice(), 2) . ' &euro; + ' . number_format($pricing->getShippingPrice(), 2) . ' &euro;';
            echo "<br />";
        }
    }    
    else // Partner using pricing V2 API
    {        
        $pricing = $data->offsetGet(0);
        
        if($pricing->getNewPrice())
        {
            echo "<em>New</em><br />" . number_format($pricing->getNewPrice(), 2) . ' &euro; + ' . number_format($pricing->getNewShipping(), 2) . ' &euro;';
            echo "<br />";
        }
        
        if($pricing->getRefurbishedPrice())
        {
            echo "<em>Refurbished</em><br />" . number_format($pricing->getRefurbishedPrice(), 2) . ' &euro; + ' . number_format($pricing->getRefurbishedShipping(), 2) . ' &euro;';
            echo "<br />";
        }
        
        if($pricing->getUsedPrice())
        {
            echo "<em>Used</em><br />" . number_format($pricing->getUsedPrice(), 2) . ' &euro; + ' . number_format($pricing->getUsedShipping(), 2) . ' &euro;';
            echo "<br />";
        }
        
        if($pricing->getNewAdherentPrice())
        {
            echo "<em>Adherent price, new</em><br />" . number_format($pricing->getNewAdherentPrice(), 2) . ' &euro; + ' . number_format($pricing->getNewAdherentShipping(), 2) . ' &euro;';
            echo "<br />";
        }
        
        if($pricing->getRefurbishedAdherentPrice())
        {
            echo "<em>Adherent price, refurbished</em><br />" . number_format($pricing->getRefurbishedAdherentPrice(), 2) . ' &euro; + ' . number_format($pricing->getRefurbishedAdherentShipping(), 2) . ' &euro;';
            echo "<br />";
        }
        
        if($pricing->getUsedAdherentPrice())
        {
            echo "<em>Adherent price, used</em><br />" . number_format($pricing->getUsedAdherentPrice(), 2) . ' &euro; + ' . number_format($pricing->getUsedAdherentShipping(), 2) . ' &euro;';
            echo "<br />";
        }
    }
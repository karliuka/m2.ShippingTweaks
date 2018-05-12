<?php
/**
 * Copyright © 2011-2018 Karliuka Vitalii(karliuka.vitalii@gmail.com)
 * 
 * See COPYING.txt for license details.
 */
namespace Faonni\ShippingTweaks\Plugin\Shipping\Model\Rate; 

use Faonni\ShippingTweaks\Helper\Data as ShippingTweaksHelper;

/**
 * Shipping Result Plugin
 */
class Result
{   
    /**
     * Helper
     *
     * @var \Faonni\ShippingTweaks\Helper\Data
     */
    protected $_helper;
    
    /**
     * Initialize Plugin
     * 
     * @param ShippingTweaksHelper $helper
     */
    public function __construct(
        ShippingTweaksHelper $helper
    ) {
        $this->_helper = $helper;
    }
        	
    /**
     * Return all Rates in the Result
     *
     * @param Result $subject
     * @param Method[] $result
     * @return Method[]
     */	
    public function afterGetAllRates($subject, $result) 
    {
        if (!$this->_helper->isEnabled()) {
            return $result;
        }       		
		$rates = $this->getAllFreeRates($result);              
        return (count($rates) > 0) ? $rates : $result;
    }	
        	
    /**
     * Return all free Rates in the Result
     *
     * @param Method[] $result
     * @return Method[]
     */	
    public function getAllFreeRates($result) 
    {	
		$rates = [];
        foreach ($result ?: [] as $rate) {
            if ($rate->getPrice() < 0.0001) {
                $rates[] = $rate;
            }
        }               
        return $rates;
    }	    
}

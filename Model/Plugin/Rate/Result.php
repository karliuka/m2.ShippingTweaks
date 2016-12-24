<?php
/**
 * Faonni
 *  
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade module to newer
 * versions in the future.
 * 
 * @package     Faonni_ShippingTweaks
 * @copyright   Copyright (c) 2016 Karliuka Vitalii(karliuka.vitalii@gmail.com) 
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
namespace Faonni\ShippingTweaks\Model\Plugin\Rate; 

use Faonni\ShippingTweaks\Helper\Data as ShippingTweaksHelper;

/**
 * Plugin for \Magento\Shipping\Model\Rate\Result
 */
class Result
{   
    /**
     * Helper instance
     *
     * @var \Faonni\ShippingTweaks\Helper\Data
     */
    protected $_helper;
    
    /**
     * Factory constructor
     *
     * @param \Faonni\ShippingTweaks\Helper\Data $helper
     */
    public function __construct(
        ShippingTweaksHelper $helper
    ) {
        $this->_helper = $helper;
    }
        	
    /**
     * Return all rates in the result
     *
     * @param $subject Magento\Shipping\Model\Rate\Result
     * @param $result \Magento\Quote\Model\Quote\Address\RateResult\Method[]
     * @return \Magento\Quote\Model\Quote\Address\RateResult\Method[]
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
     * Return all free rates in the result
     *
     * @param $result \Magento\Quote\Model\Quote\Address\RateResult\Method[]
     * @return \Magento\Quote\Model\Quote\Address\RateResult\Method[]
     */	
    public function getAllFreeRates($result) 
    {	
		$rates = [];
        foreach ($result as $rate) {
            if ($rate->getPrice() == 0) {
                $rates[] = $rate;
            }
        }               
        return $rates;
    }	    
}

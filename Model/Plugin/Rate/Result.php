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

/**
 * Plugin for \Magento\Shipping\Model\Rate\Result
 */
class Result
{
    /**
     * Return all quotes in the result
     *
     * @param $subject Magento\Shipping\Model\Rate\Result
     * @param $result \Magento\Quote\Model\Quote\Address\RateResult\Method[]
     * @return \Magento\Quote\Model\Quote\Address\RateResult\Method[]
     */	
    public function afterGetAllRates($subject, $result) 
    {
		$rates = [];
        foreach ($result as $rate) {
            if ($rate->getPrice() == 0) {
                $rates[] = $rate;
            }
        }       
        return (count($rates) > 0) ? $rates : $result;
    }	
}

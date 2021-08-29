<?php
/**
 * Copyright © Karliuka Vitalii(karliuka.vitalii@gmail.com)
 * See COPYING.txt for license details.
 */
namespace Faonni\ShippingTweaks\Plugin\Shipping\Model\Rate;

use Magento\Quote\Model\Quote\Address\RateResult\Method;
use Magento\Shipping\Model\Rate\Result as Subject;
use Faonni\ShippingTweaks\Helper\Data as ShippingTweaksHelper;

/**
 * Shipping Result Plugin
 */
class Result
{
    /**
     * Helper
     *
     * @var ShippingTweaksHelper
     */
    protected $helper;

    /**
     * Initialize Plugin
     *
     * @param ShippingTweaksHelper $helper
     */
    public function __construct(
        ShippingTweaksHelper $helper
    ) {
        $this->helper = $helper;
    }

    /**
     * Return all Rates in the Result
     *
     * @param Subject $subject
     * @param Method[] $result
     * @return Method[]
     */
    public function afterGetAllRates(Subject $subject, $result)
    {
        if (!$this->helper->isEnabled()) {
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
            if ($rate->getPrice() < 0.0001 ) {
                $rates[] = $rate;
            }
        }
        return $rates;
    }
}

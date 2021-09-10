<?php
/**
 * Copyright © Karliuka Vitalii(karliuka.vitalii@gmail.com)
 * See COPYING.txt for license details.
 */
namespace Faonni\ShippingTweaks\Plugin\Shipping\Model\Rate;

use Magento\Quote\Model\Quote\Address\RateResult\AbstractResult;
use Magento\Shipping\Model\Rate\Result as Subject;
use Faonni\ShippingTweaks\Helper\Data as ShippingTweaksHelper;

/**
 * Shipping result plugin
 */
class Result
{
    /**
     * @var ShippingTweaksHelper
     */
    private $helper;

    /**
     * Initialize plugin
     *
     * @param ShippingTweaksHelper $helper
     */
    public function __construct(
        ShippingTweaksHelper $helper
    ) {
        $this->helper = $helper;
    }

    /**
     * Return all rates in the result
     *
     * @param Subject $subject
     * @param AbstractResult[] $result
     * @return AbstractResult[]
     */
    public function afterGetAllRates(Subject $subject, $result)
    {
        return $this->helper->isEnabled() ? $this->updateRates($result) : $result;
    }

    /**
     * Retrieve updated rates in the result
     *
     * @param AbstractResult[] $result
     * @return AbstractResult[]
     */
    private function updateRates($result)
    {
        $freeRates = [];
        $otherFreeRates = [];

        foreach ($result ?: [] as $rate) {
            if ($rate->getPrice() < 0.0001) {
                /* full code of shipping method */
                $code = $rate->getCarrier() . '_' . $rate->getMethod();
                if ($this->helper->isAllFreeMethods() ||
                    in_array($code, $this->helper->getSpecificMethods())
                ) {
                    $freeRates[] = $rate;
                    continue;
                }
                $otherFreeRates[] = $rate;
            }
        }
        return $this->resolveResult($freeRates, $otherFreeRates, $result);
    }

    /**
     * Resolve result
     *
     * @param AbstractResult[] $freeRates
     * @param AbstractResult[] $otherFreeRates
     * @param AbstractResult[] $result
     * @return AbstractResult[]
     */
    private function resolveResult(array $freeRates, array $otherFreeRates, array $result)
    {
        if (0 < count($freeRates)) {
            array_push($freeRates, ...$otherFreeRates);
            return $freeRates;
        }
        return $result;
    }
}

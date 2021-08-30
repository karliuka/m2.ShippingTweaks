<?php
/**
 * Copyright © Karliuka Vitalii(karliuka.vitalii@gmail.com)
 * See COPYING.txt for license details.
 */
namespace Faonni\ShippingTweaks\Helper;

use Magento\Store\Model\ScopeInterface;
use Magento\Framework\App\Helper\AbstractHelper;

/**
 * Shipping tweaks helper
 */
class Data extends AbstractHelper
{
    /**
     * Enabled config path
     */
    const XML_ENABLED = 'shipping/behavior/tweaks';

    /**
     * All free methods config path
     */
    const XML_ALL_FREE_METHODS = 'shipping/behavior/all_free_methods';

    /**
     * Specific methods config path
     */
    const XML_SPECIFIC_METHODS = 'shipping/behavior/specific_methods';

    /**
     * Check tweaks mode functionality should be enabled
     *
     * @param int|null $storeId
     * @return bool
     */
    public function isEnabled($storeId = null)
    {
        return $this->isSetFlag(static::XML_ENABLED, $storeId);
    }

    /**
     * Check all free methods be enabled
     *
     * @param int|null $storeId
     * @return bool
     */
    public function isAllFreeMethods($storeId = null)
    {
        return $this->isSetFlag(static::XML_ALL_FREE_METHODS, $storeId);
    }

    /**
     * Retrieve specific methods
     *
     * @param int|null $storeId
     * @return string[]
     */
    public function getSpecificMethods($storeId = null)
    {
        return explode(',', $this->getValue(self::XML_SPECIFIC_METHODS, $storeId));
    }

    /**
     * Retrieve config value by path and scope
     *
     * @param string $path
     * @param int|null $storeId
     * @return mixed
     */
    private function getValue($path, $storeId = null)
    {
        return $this->scopeConfig->getValue($path, ScopeInterface::SCOPE_STORE, $storeId);
    }

    /**
     * Retrieve config flag
     *
     * @param string $path
     * @param int|null $storeId
     * @return bool
     */
    private function isSetFlag($path, $storeId = null)
    {
        return $this->scopeConfig->isSetFlag($path, ScopeInterface::SCOPE_STORE, $storeId);
    }
}

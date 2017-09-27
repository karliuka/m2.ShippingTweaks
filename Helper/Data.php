<?php
/**
 * Copyright © 2011-2017 Karliuka Vitalii(karliuka.vitalii@gmail.com)
 * 
 * See COPYING.txt for license details.
 */
namespace Faonni\ShippingTweaks\Helper;

use Magento\Store\Model\ScopeInterface;
use Magento\Framework\App\Helper\AbstractHelper;

/**
 * Faonni ShippingTweaks Data helper
 */
class Data extends AbstractHelper
{
    /**
     * Enabled config path
     */
    const XML_TWEAKS_ENABLED = 'shipping/behavior/tweaks';
 	
    /**
     * Check Tweaks mode functionality should be enabled
     *
     * @return bool
     */
    public function isEnabled()
    {
        return $this->_getConfig(self::XML_TWEAKS_ENABLED);
    } 

    /**
     * Retrieve store configuration data
     *
     * @param   string $path
     * @return  string|null
     */
    protected function _getConfig($path)
    {
        return $this->scopeConfig->getValue($path, ScopeInterface::SCOPE_STORE);
    }      
}

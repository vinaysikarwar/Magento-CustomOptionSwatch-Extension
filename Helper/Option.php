<?php

namespace WTC\ColorSwatch\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Option extends AbstractHelper
{

    /**
     * @param null $field
     * @param null $storeId
     * @return mixed
     */
    public function getConfig($field = null, $storeId = null)
    {
        $settings = $this->scopeConfig->getValue('colorswatch', ScopeInterface::SCOPE_STORE, $storeId)['csimages'];
        if (!$settings) {
            $settings = array();
        }
		
        if ($field != null) {
            return (isset($settings[$field])) ? $settings[$field] : false;
        } else {
            return $settings;
        }
    }
}
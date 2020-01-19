<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace WTC\ColorSwatch\Model\Config\Source;

/**
 * @api
 * @since 100.0.2
 */
class MultiselectOrderStatus extends \Magento\Payment\Model\Source\Cctype
{

    /**
     * Allowed credit card types
     *
     * @return string[]
     */
    public function getAllowedStatuses()
    {
        return array(
            1 => 'Pending',
            2 => 'Processing',
            3 => 'On Hold',
            4 => 'Complete',
            5 => 'Canceled',
            6 => 'Closed',
            7 => 'Suspected Fraud',
            8 => 'Pending Payment',
            9 => 'Pending Review',
            10 => 'Open'
        );
    }

    /**
     * @inheritdoc
     */
    public function toOptionArray()
    {
        $allowed = $this->getAllowedStatuses();
        $options = [];

        foreach ($allowed as $value => $order_status){
          //$options[] = ['value' => $value, 'label' => $order_status];
		  $options[$value] = $order_status ;
        }

        return $options;
    }
}

<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace ActiveDEMAND\ActiveDEMAND\Model\Config\Source;

/**
 * @api
 * @since 100.0.2
 */
class FormsToConfig implements \Magento\Framework\Option\ArrayInterface
{

    /**
     * @var \ActiveDEMAND\ActiveDEMAND\Helper\Option
     */
    protected $admOption;

    /**
     * @var \ActiveDEMAND\ActiveDEMAND\Helper\Request
     */
    protected $admRequest;

    /**
     * FormsToConfig constructor.
     * @param \ActiveDEMAND\ActiveDEMAND\Helper\Option $admOption
     */
    public function __construct(
        \ActiveDEMAND\ActiveDEMAND\Helper\Option $admOption,
        \ActiveDEMAND\ActiveDEMAND\Helper\Request $admRequest
    ) {
        $this->admOption = $admOption;
        $this->admRequest = $admRequest;
    }

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        $result = $this->admRequest->admRequest('forms');

        $forms = json_decode($result);

        $forms_array = [];
        $stxt = 'Submit To Form: ';
        $forms_array['0'] = 'Do nothing';

        if (empty($forms)) {
            return $forms_array;
        }

        foreach ($forms as $form) {
            if (isset($form->id) && isset($form->name)) {
                $forms_array[$form->id] = $stxt . $form->name;
            }
        }
        //===

        return $forms_array;
    }
}

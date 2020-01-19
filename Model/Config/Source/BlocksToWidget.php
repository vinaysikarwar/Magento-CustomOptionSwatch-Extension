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
class BlocksToWidget implements \Magento\Framework\Option\ArrayInterface
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
     * BlocksToWidget constructor.
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
        $result = $this->admRequest->admRequest('smart_blocks');

        $blocks = json_decode($result);

        $blocks_array = [];

        if (empty($blocks)) {
            return $blocks_array;
        }

        foreach ($blocks as $block) {
            if (isset($block->id) && isset($block->name)) {
                $blocks_array[$block->id] = $block->name;
            }
        }
        //===

        return $blocks_array;
    }
}

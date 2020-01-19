<?php

namespace WTC\ColorSwatch\Block\Adminhtml\Form\Field;

class Abandoned extends \Magento\Config\Block\System\Config\Form\Field
{
     
	protected function _prepareLayout()
    {
        parent::_prepareLayout();
        if (!$this->getTemplate()) {
            $this->setTemplate('WTC\ColorSwatch::system/config/mapping.phtml');
        }
        return $this;
    } 
	 
	 
     public function render(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        $element->unsScope()->unsCanUseWebsiteValue()->unsCanUseDefaultValue();
        return parent::render($element);
    }

    /**
     * Get the button and scripts contents
     *
     * @param \Magento\Framework\Data\Form\Element\AbstractElement $element
     * @return string
     */
    protected function _getElementHtml(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        $originalData = $element->getOriginalData();
        $buttonLabel = !empty($originalData['button_label']) ? $originalData['button_label'] : $this->_vatButtonLabel;
        $this->addData(
            [
                'button_label' => __('Edit'),
                'html_id' => $element->getHtmlId(),
                'ajax_url' => '',
            ]
        );

        return $this->_toHtml();
    }
}

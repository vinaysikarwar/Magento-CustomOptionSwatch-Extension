<?php
namespace WTC\ColorSwatch\Block\Adminhtml\Form\Field;

class Edits extends \Magento\Framework\View\Element\AbstractBlock
{
   
    
    public function __construct(
        \Magento\Framework\View\Element\Context $context,
        \Psr\Log\LoggerInterface $logger,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_logger = $logger;   
    }

    /**
     * @param string $value
     * @return Magently\Tutorial\Block\Adminhtml\Form\Field\Activation
     */
    public function setInputName($value)
    {
       return $this->setName($value);
    }

    /**
     * Parse to html.
     *
     * @return mixed
     */
    public function _toHtml()
    {
      echo '<a class="openeditform"><span class="data-grid-row-changed"></span></a>';
      return parent::_toHtml();
    }
}
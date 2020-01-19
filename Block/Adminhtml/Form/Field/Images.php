<?php
/**
 * @author WTC Team
 * @copyright Copyright (c) 2018
 * @package
 */

namespace WTC\ColorSwatch\Block\Adminhtml\Form\Field;

use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;

use Magento\Backend\Block\Template\Context;
use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

/**
 * Class Images
 */
class Images extends AbstractFieldArray
{
	
	
	   protected $_activation;
	   protected $_allstatus;
	   protected $_Editform;
	 
	 
	public function __construct(
        Context $context,
        array $data = []
    ){
      parent::__construct($context, $data);
    } 
	 
	 
    protected function _prepareToRender()
    {
		$this->addColumn('color',['label' => __('Color'),'class' => 'required-entry']);
		$this->addColumn('swatchimage',['label' => __('Swatch Image'), 'type' => 'image','class' => 'activeform']);
        $this->_addAfter = false;
        $this->_addButtonLabel = __('Add');
    }
	
}

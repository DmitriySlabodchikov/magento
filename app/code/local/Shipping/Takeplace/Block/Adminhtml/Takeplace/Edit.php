<?php

class Shipping_Takeplace_Block_Adminhtml_Takeplace_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{

    protected function _construct()
    {
        $this->_blockGroup = 'shippingtakeplace';
        $this->_controller = 'adminhtml_takeplace';
    }

    public function getHeaderText()
    {
        $helper = Mage::helper('shippingtakeplace');
        $model = Mage::registry('current_takeplace');

        if ($model->getId()) {
            return $helper->__("Edit Place '%s'", $this->escapeHtml($model->getTitle()));
        } else {
            return $helper->__("Add Place");
        }
    }

}
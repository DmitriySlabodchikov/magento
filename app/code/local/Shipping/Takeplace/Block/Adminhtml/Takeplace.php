<?php

class Shipping_Takeplace_Block_Adminhtml_Takeplace extends Mage_Adminhtml_Block_Widget_Grid_Container
{

    protected function _construct()
    {
        parent::_construct();

        $helper = Mage::helper('shippingtakeplace');
        $this->_blockGroup = 'shippingtakeplace';
        $this->_controller = 'adminhtml_takeplace';

        $this->_headerText = $helper->__('Place for pick up management');
        $this->_addButtonLabel = $helper->__('Add place');
    }

}

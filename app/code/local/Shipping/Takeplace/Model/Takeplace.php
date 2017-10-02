<?php

class Shipping_Takeplace_Model_Takeplace extends Mage_Core_Model_Abstract
{

    public function _construct()
    {
        parent::_construct();
        $this->_init('shippingtakeplace/takeplace');
    }

}
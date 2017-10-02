<?php

class Shipping_Takeplace_Model_Resource_Takeplace_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{

    public function _construct()
    {
        parent::_construct();
        $this->_init('shippingtakeplace/takeplace');
    }

}
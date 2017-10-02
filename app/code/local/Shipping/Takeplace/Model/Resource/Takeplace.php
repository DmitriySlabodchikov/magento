<?php

class Shipping_Takeplace_Model_Resource_Takeplace extends Mage_Core_Model_Mysql4_Abstract
{

    public function _construct()
    {
        $this->_init('shippingtakeplace/table_takeplace', 'takeplace_id');
    }

}
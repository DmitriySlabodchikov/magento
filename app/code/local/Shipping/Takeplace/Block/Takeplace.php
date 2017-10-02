<?php

class Shipping_Takeplace_Block_Takeplace extends Mage_Core_Block_Template
{

    public function getTakeplaceCollection()
    {
        $takeplaceCollection = Mage::getModel('shippingtakeplace/takeplace')->getCollection();
        //$takeplaceCollection->setOrder('created', 'DESC');
        return $takeplaceCollection;
    }

}
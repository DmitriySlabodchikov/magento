<?php

class Shipping_Takeplace_IndexController extends Mage_Core_Controller_Front_Action
{

    public function indexAction()
    {
        $takeplace = Mage::getModel('shippingtakeplace/takeplace')->getCollection()->setOrder('takeplace_id', 'DESC');
        $viewUrl = Mage::getUrl('takeplace/index/view');

        echo '<p><input name="shipping" type="radio" value="take">pickup in store</p> <select>';
        foreach ($takeplace as $item) {
            echo '<option>' . $item->getTakeplace() . '</option>';
        }
        echo '</select>';
    }

    public function viewAction()
    {
        $takeplaceId = Mage::app()->getRequest()->getParam('id', 0);
        $takeplace = Mage::getModel('shippingtakeplace/takeplace')->load($takeplaceId);

        if ($takeplace->getId() > 0) {
            $this->loadLayout();
            $this->getLayout()->getBlock('takeplace.content')->assign(array(
                "takeplaceItem" => $takeplace,
            ));
            $this->renderLayout();
        } else {
            $this->_forward('noRoute');
        }
    }

}


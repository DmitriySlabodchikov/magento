<?php

class Shipping_Takeplace_Adminhtml_TakeplaceController extends Mage_Adminhtml_Controller_Action
{

    public function indexAction()
    {
        $this->loadLayout()->_setActiveMenu('shippingtakeplace');
        $this->_addContent($this->getLayout()->createBlock('shippingtakeplace/adminhtml_takeplace'));
        $this->renderLayout();
    }

    public function newAction()
    {
        $this->_forward('edit');
    }

    public function editAction()
    {
        $id = (int) $this->getRequest()->getParam('id');
        Mage::register('current_takeplace', Mage::getModel('shippingtakeplace/takeplace')->load($id));

        $this->loadLayout()->_setActiveMenu('shippingtakeplace');
        $this->_addContent($this->getLayout()->createBlock('shippingtakeplace/adminhtml_takeplace_edit'));
        $this->renderLayout();
    }

    public function saveAction()
    {
        if ($data = $this->getRequest()->getPost()) {
            try {
                $model = Mage::getModel('shippingtakeplace/takeplace');
                $model->setData($data)->setId($this->getRequest()->getParam('id'));
                if(!$model->getCreated()){
                    $model->setCreated(now());
                }
                $model->save();

                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('Place was saved successfully'));
                Mage::getSingleton('adminhtml/session')->setFormData(false);
                $this->_redirect('*/*/');
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setFormData($data);
                $this->_redirect('*/*/edit', array(
                    'id' => $this->getRequest()->getParam('id')
                ));
            }
            return;
        }
        Mage::getSingleton('adminhtml/session')->addError($this->__('Unable to find item to save'));
        $this->_redirect('*/*/');
    }

    public function deleteAction()
    {
        if ($id = $this->getRequest()->getParam('id')) {
            try {
                Mage::getModel('shippingtakeplace/takeplace')->setId($id)->delete();
                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('Place was deleted successfully'));
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $id));
            }
        }
        $this->_redirect('*/*/');
    }

    public function massDeleteAction()
    {
        $takeplace = $this->getRequest()->getParam('takeplace', null);

        if (is_array($takeplace) && sizeof($takeplace) > 0) {
            try {
                foreach ($takeplace as $id) {
                    Mage::getModel('shippingtakeplace/takeplace')->setId($id)->delete();
                }
                $this->_getSession()->addSuccess($this->__('Total of %d places have been deleted', sizeof($takeplace)));
            } catch (Exception $e) {
                $this->_getSession()->addError($e->getMessage());
            }
        } else {
            $this->_getSession()->addError($this->__('Please select place'));
        }
        $this->_redirect('*/*');
    }

}
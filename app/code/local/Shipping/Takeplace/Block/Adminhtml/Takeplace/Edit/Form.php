<?php

class Shipping_Takeplace_Block_Adminhtml_Takeplace_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{

    protected function _prepareForm()
    {
        $helper = Mage::helper('shippingtakeplace');
        $model = Mage::registry('current_takeplace');

        $form = new Varien_Data_Form(array(
                    'id' => 'edit_form',
                    'action' => $this->getUrl('*/*/save', array(
                        'id' => $this->getRequest()->getParam('id')
                    )),
                    'method' => 'post',
                    'enctype' => 'multipart/form-data'
                ));

        $this->setForm($form);

        $fieldset = $form->addFieldset('takeplace_form', array('legend' => $helper->__('Pick up place Information')));

        $fieldset->addField('takeplace', 'text', array(
            'label' => $helper->__('Takeplace'),
            'required' => true,
            'name' => 'takeplace',
        ));

        $form->setUseContainer(true);

        if($data = Mage::getSingleton('adminhtml/session')->getFormData()){
            $form->setValues($data);
        } else {
            $form->setValues($model->getData());
        }

        return parent::_prepareForm();
    }

}
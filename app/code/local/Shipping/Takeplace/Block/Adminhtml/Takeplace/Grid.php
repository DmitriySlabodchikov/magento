<?php

class Shipping_Takeplace_Block_Adminhtml_Takeplace_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('shippingtakeplace/takeplace')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {

        $helper = Mage::helper('shippingtakeplace');

        $this->addColumn('takeplace_id', array(
            'header' => $helper->__('Takeplace ID'),
            'index' => 'takeplace_id'
        ));

        $this->addColumn('takeplace', array(
            'header' => $helper->__('Takeplace'),
            'index' => 'takeplace',
            'type' => 'text',
        ));


        return parent::_prepareColumns();
    }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('takeplace_id');
        $this->getMassactionBlock()->setFormFieldName('takeplace');

        $this->getMassactionBlock()->addItem('delete', array(
            'label' => $this->__('Delete'),
            'url' => $this->getUrl('*/*/massDelete'),
        ));
        return $this;
    }

    public function getRowUrl($model)
    {
        return $this->getUrl('*/*/edit', array(
                    'id' => $model->getId(),
                ));
    }

}
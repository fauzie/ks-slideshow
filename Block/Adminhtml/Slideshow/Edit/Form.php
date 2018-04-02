<?php
/**
 * @version   1.0.0
 *
 * @author    Rizal Fauzie <rfridwan@kemana.com>
 * @copyright Copyright (C) 2016 Rizal Fauzie
 */
class KS_Slideshow_Block_Adminhtml_Slideshow_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form(array(
              'id' => 'edit_form',
              'action' => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
              'method' => 'post',
              'enctype' => 'multipart/form-data',
           )
        );

        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}

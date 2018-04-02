<?php
/**
 * @version   1.0.0
 *
 * @author    Rizal Fauzie <rfridwan@kemana.com>
 * @copyright Copyright (C) 2016 Rizal Fauzie
 */
class KS_Slideshow_Block_Adminhtml_Slideshow_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();

        $this->_objectId = 'id';
        $this->_blockGroup = 'slideshow';
        $this->_controller = 'adminhtml_slideshow';

        $this->_updateButton('save', 'label', Mage::helper('slideshow')->__('Save Slide'));
        $this->_updateButton('delete', 'label', Mage::helper('slideshow')->__('Delete Slide'));

        $this->_addButton('saveandcontinue', array(
            'label' => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick' => 'saveAndContinueEdit()',
            'class' => 'save',
        ), -100);

        $this->_formScripts[] = "
            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if (Mage::registry('slideshow_data') && Mage::registry('slideshow_data')->getId()) {
            return Mage::helper('slideshow')->__('Edit Slide');
        } else {
            return Mage::helper('slideshow')->__('Add Slide');
        }
    }
}

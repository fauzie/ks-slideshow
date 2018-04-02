<?php
/**
 * @version   1.0.0
 *
 * @author    Rizal Fauzie <rfridwan@kemana.com>
 * @copyright Copyright (C) 2016 Rizal Fauzie
 */
class KS_Slideshow_Block_Adminhtml_Slideshow_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $data = array();
        if (Mage::getSingleton('adminhtml/session')->getAthleteslideshowData()) {
            $data = Mage::getSingleton('adminhtml/session')->getAthleteslideshowData();
        } elseif (Mage::registry('slideshow_data')) {
            $data = Mage::registry('slideshow_data')->getData();
        }

        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset('slideshow_form', array('legend' => Mage::helper('slideshow')->__('Slide information')));

        $fieldset->addField('store_id', 'multiselect', array(
            'name' => 'stores[]',
            'label' => Mage::helper('slideshow')->__('Store View'),
            'title' => Mage::helper('slideshow')->__('Store View'),
            'required' => true,
            'values' => Mage::getSingleton('adminhtml/system_store')->getStoreValuesForForm(false, true),
        ));

        $fieldset->addField('image', 'image', array(
            'label' => Mage::helper('slideshow')->__('Background Image'),
            'required' => false,
            'name' => 'image',
        ));

        $fieldset->addField('title_color', 'text', array(
            'label' => Mage::helper('slideshow')->__('Title color'),
            'name' => 'title_color',
            'class' => 'jscolor',
            'note' => 'Leave empty to use default colors',
        ));

        $fieldset->addField('title_bg', 'text', array(
            'label' => Mage::helper('slideshow')->__('Title background'),
            'name' => 'title_bg',
            'class' => 'jscolor',
            'note' => 'Leave empty to use default colors',
        ));

        $fieldset->addField('title', 'textarea', array(
            'label' => Mage::helper('slideshow')->__('Title'),
            'required' => false,
            'name' => 'title',
        ));

        $fieldset->addField('link_color', 'text', array(
            'label' => Mage::helper('slideshow')->__('Link color'),
            'name' => 'link_color',
            'class' => 'jscolor',
            'note' => 'Leave empty to use default colors',
        ));

        $fieldset->addField('link_bg', 'text', array(
            'label' => Mage::helper('slideshow')->__('Link background'),
            'name' => 'link_bg',
            'class' => 'jscolor',
            'note' => 'Leave empty to use default colors',
        ));

        $fieldset->addField('link_hover_color', 'text', array(
            'label' => Mage::helper('slideshow')->__('Link hover color'),
            'name' => 'link_hover_color',
            'class' => 'jscolor',
            'note' => 'Leave empty to use default colors',
        ));

        $fieldset->addField('link_hover_bg', 'text', array(
            'label' => Mage::helper('slideshow')->__('Link hover background'),
            'name' => 'link_hover_bg',
            'class' => 'jscolor',
            'note' => 'Leave empty to use default colors',
        ));

        $fieldset->addField('link_text', 'text', array(
            'label' => Mage::helper('slideshow')->__('Link text'),
            'required' => false,
            'name' => 'link_text',
        ));

        $fieldset->addField('link_href', 'text', array(
            'label' => Mage::helper('slideshow')->__('Link Url'),
            'required' => false,
            'name' => 'link_href',
        ));

        $fieldset->addField('banner_1_img', 'image', array(
            'label' => Mage::helper('slideshow')->__('Banner 1 image'),
            'required' => false,
            'name' => 'banner_1_img',
        ));

        $fieldset->addField('banner_1_href', 'text', array(
            'label' => Mage::helper('slideshow')->__('Banner 1 Url'),
            'required' => false,
            'name' => 'banner_1_href',
        ));

        $fieldset->addField('banner_2_img', 'image', array(
            'label' => Mage::helper('slideshow')->__('Banner 2 image'),
            'required' => false,
            'name' => 'banner_2_img',
        ));

        $fieldset->addField('banner_2_href', 'text', array(
            'label' => Mage::helper('slideshow')->__('Banner 2 Url'),
            'required' => false,
            'name' => 'banner_2_href',
        ));

        $fieldset->addField('status', 'select', array(
            'label' => Mage::helper('slideshow')->__('Status'),
            'name' => 'status',
            'values' => array(
                array(
                    'value' => 1,
                    'label' => Mage::helper('slideshow')->__('Enabled'),
                ),
                array(
                    'value' => 2,
                    'label' => Mage::helper('slideshow')->__('Disabled'),
                ),
            ),
        ));

        $fieldset->addField('sort_order', 'text', array(
            'label' => Mage::helper('slideshow')->__('Sort Order'),
            'required' => false,
            'name' => 'sort_order',
        ));

        if (Mage::getSingleton('adminhtml/session')->getAthleteslideshowData()) {
            $form->setValues(Mage::getSingleton('adminhtml/session')->getAthleteslideshowData());
            Mage::getSingleton('adminhtml/session')->getAthleteslideshowData(null);
        } elseif (Mage::registry('slideshow_data')) {
            $form->setValues(Mage::registry('slideshow_data')->getData());
        }

        return parent::_prepareForm();
    }
}

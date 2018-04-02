<?php
/**
 * @version   1.0.0
 *
 * @author    Rizal Fauzie <rfridwan@kemana.com>
 * @copyright Copyright (C) 2016 Rizal Fauzie
 */
class KS_Slideshow_Block_Adminhtml_Slideshow_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('slideshow_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('slideshow')->__('Slide Data'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('slideshow')->__('Slide Information'),
          'title'     => Mage::helper('slideshow')->__('Slide Information'),
          'content'   => $this->getLayout()->createBlock('slideshow/adminhtml_slideshow_edit_tab_form')->toHtml(),
      ));

      return parent::_beforeToHtml();
  }
}

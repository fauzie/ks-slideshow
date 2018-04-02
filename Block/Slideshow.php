<?php
/**
 * @version   1.0.0
 *
 * @author    Rizal Fauzie <rfridwan@kemana.com>
 * @copyright Copyright (C) 2016 Rizal Fauzie
 */
class KS_Slideshow_Block_Slideshow extends Mage_Core_Block_Template
{
    protected function _beforeToHtml()
    {
        $this->setTemplate('KS/slideshow/athlete.phtml');
        return $this;
    }

    public function _prepareLayout()
    {
        return parent::_prepareLayout();
    }

    public function getSlideshow()
    {
        if (!$this->hasData('slideshow')) {
            $this->setData('slideshow', Mage::registry('slideshow'));
        }

        return $this->getData('slideshow');
    }

    public function getSlides()
    {
        $model = Mage::getModel('slideshow/slideshow');
        $slides = $model->getCollection()
            ->addStoreFilter(Mage::app()->getStore())
            ->addFieldToSelect('*')
            ->addFieldToFilter('status', 1)
            ->setOrder('sort_order', 'asc');

        return $slides;
    }
}

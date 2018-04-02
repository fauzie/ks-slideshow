<?php
/**
 * @version   1.0.0
 * @author    Rizal Fauzie <rfridwan@kemana.com>
 * @copyright Copyright (C) 2016 Rizal Fauzie
 */

class KS_Slideshow_Model_Status extends Varien_Object
{
    const STATUS_ENABLED	= 1;
    const STATUS_DISABLED	= 2;

    static public function getOptionArray()
    {
        return array(
            self::STATUS_ENABLED    => Mage::helper('slideshow')->__('Enabled'),
            self::STATUS_DISABLED   => Mage::helper('slideshow')->__('Disabled')
        );
    }
}

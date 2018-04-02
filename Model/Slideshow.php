<?php
/**
 * @version   1.0.0
 * @author    Rizal Fauzie <rfridwan@kemana.com>
 * @copyright Copyright (C) 2016 Rizal Fauzie
 */

class KS_Slideshow_Model_Slideshow extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('slideshow/slideshow');
    }
}

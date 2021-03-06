<?php
/**
 * @version   1.0.0
 *
 * @author    Rizal Fauzie <rfridwan@kemana.com>
 * @copyright Copyright (C) 2016 Rizal Fauzie
 */
class KS_Slideshow_Block_Adminhtml_Slideshow_Grid_Renderer_Image extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Action
{
    public function render(Varien_Object $row)
    {
        return $this->_getValue($row);
    }

    public function _getValue(Varien_Object $row)
    {
        if ($getter = $this->getColumn()->getGetter()) {
            $val = $row->$getter();
        }
        $val = $row->getData($this->getColumn()->getIndex());
        $val = str_replace('no_selection', '', $val);
        $out = '';
        if (!empty($val)) {
            $url = Mage::getBaseUrl('media').$val;
            $out = '<center><a href="'.$url.'" target="_blank" id="imageurl">';
            $out .= '<img src='.$url." width='300px' />";
            $out .= '</a></center>';
        }

        return $out;
    }
}

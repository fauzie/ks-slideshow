<?php
/**
 * @version   1.0.0
 *
 * @author    Rizal Fauzie <rfridwan@kemana.com>
 * @copyright Copyright (C) 2016 Rizal Fauzie
 */
class KS_Slideshow_Model_Config_Autoheight
{
    public function toOptionArray()
    {
        $options = array();
        $options[] = array(
            'value' => 'container',
            'label' => 'adjust height per slide',
        );
        $options[] = array(
            'value' => 'calc',
            'label' => 'calculate the tallest slide and use it',
        );

        return $options;
    }
}

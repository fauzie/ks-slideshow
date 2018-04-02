<?php
/**
 * @version   1.0.0
 *
 * @author    Rizal Fauzie <rfridwan@kemana.com>
 * @copyright Copyright (C) 2016 Rizal Fauzie
 */
class KS_Slideshow_Model_Config_Effect
{
    /**
     * effects list.
     *
     * @var string
     */
    private $effects = 'scrollHorz,scrollVert,fade';

    public function toOptionArray()
    {
        $fonts = explode(',', $this->effects);
        $options = array();
        foreach ($fonts as $f) {
            $options[] = array(
                'value' => $f,
                'label' => $f,
            );
        }

        return $options;
    }
}

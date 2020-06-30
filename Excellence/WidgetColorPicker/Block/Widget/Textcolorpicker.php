<?php
declare(strict_types=1);

namespace Excellence\WidgetColorPicker\Block\Widget;

use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

class Textcolorpicker extends Template implements BlockInterface
{

    protected $_template = "widget/textcolorpicker.phtml";


    public function getDescription()
    {
        $desc = $this->getData('test_desc');
        //it will return your description which is added in your widget
    }
 
    public function getSelectValue()
    {
        return $this->getData('test_select');
        //will return select option value
    }
}


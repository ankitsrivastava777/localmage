<?php

namespace Excellence\GridRate\Block\Adminhtml\System\Form\Field;

use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;
use Magento\Framework\DataObject;

class Grid extends AbstractFieldArray
{
    protected $_typeRenderer;

    protected function _prepareToRender()
    {
        $this->_typeRenderer = null;

        $this->addColumn('shippingprice', ['label' => __('Shipping Price')]);

        $this->addColumn('custom', [
            'label' => __('Country'),
            'renderer' => $this->getCountryRenderer()
        ]);
        $this->addColumn('minweight', ['label' => __('Min Weight')]);
        $this->addColumn('maxweight', ['label' => __('Max Weight')]);

        $this->_addAfter = false;
        $this->_addButtonLabel = __('Add');
    }

    protected function _prepareArrayRow(DataObject $row)
    {
        $optionExtraAttr = [];
        $optionExtraAttr['option_' . $this->getCountryRenderer()->calcOptionHash($row->getData('custom'))] =
            'selected="selected"';
        $row->setData(
            'option_extra_attrs',
            $optionExtraAttr
        );
    }

    private function getCountryRenderer()
    {
        if (!$this->_typeRenderer) {
            $this->_typeRenderer = $this->getLayout()->createBlock(
                \Excellence\GridRate\Block\Adminhtml\System\Form\Field\CountryColumn::class,
                '',
                ['data' => ['is_render_to_js_template' => true]]
            );
            $this->_typeRenderer->setClass('country_select');
        }
        return $this->_typeRenderer;
    }
}

<?php

declare(strict_types=1);

namespace Excellence\GridRate\Block\Adminhtml\System\Form\Field;

use Magento\Braintree\Helper\Country;
use Magento\Framework\View\Element\Context;
use Magento\Framework\View\Element\Html\Select;

class CountryColumn extends Select
{
    private $countryHelper;

    public function __construct(
        Context $context,
        Country $countryHelper,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->countryHelper = $countryHelper;
    }

    public function setInputName($value)
    {
        return $this->setName($value);
    }

    public function _toHtml(): string
    {
        if (!$this->getOptions()) {
            $this->setOptions($this->countryHelper->getCountries());
        }
        $this->setExtraParams('selected="selected"');
        return parent::_toHtml();
    }
}

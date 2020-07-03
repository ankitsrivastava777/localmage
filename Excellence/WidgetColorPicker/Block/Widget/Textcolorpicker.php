<?php

declare(strict_types=1);

namespace Excellence\WidgetColorPicker\Block\Widget;

use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;
use Magento\Catalog\Model\Product;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Registry;

class Textcolorpicker extends Template implements BlockInterface
{
    protected $_template = "widget/textcolorpicker.phtml";
    protected $registry;
    /**
     * @var Product
     */
    private $product;

    public function __construct(
        Template\Context $context,
        Registry $registry,
        array $data
    ) {
        $this->registry = $registry;
        parent::__construct($context, $data);
    }

    private function getProduct()
    {
        if (is_null($this->product)) {
            $this->product = $this->registry->registry('product');

            if (!$this->product->getId()) {
                throw new LocalizedException(__('Failed to initialize product'));
            }
        }
        return $this->product;
    }

    public function getProductPrice()
    {
        return $this->getProduct()->getPrice();
    }
    public function getProductConfPrice()
    {
        return $this->getProduct()->getFinalPrice();
    }
    public function getProductType()
    {
        return $this->getProduct()->getTypeId();
    }
}

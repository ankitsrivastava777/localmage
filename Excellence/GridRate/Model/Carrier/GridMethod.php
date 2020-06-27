<?php

namespace Excellence\GridRate\Model\Carrier;

use Magento\Quote\Model\Quote\Address\RateRequest;

class GridMethod extends \Magento\Shipping\Model\Carrier\AbstractCarrier implements
    \Magento\Shipping\Model\Carrier\CarrierInterface
{
    /**
     * @var string
     */
    protected $_code = 'gridmethod';
    protected $serialize;
    protected $helperData;
    protected $_logger;
    /**
     * @var bool
     */
    protected $_isFixed = true;

    /**
     * @var \Magento\Shipping\Model\Rate\ResultFactory
     */
    protected $_rateResultFactory;
    /**
     * @var \Magento\Quote\Model\Quote\Address\RateResult\MethodFactory
     */
    protected $_rateMethodFactory;

    /**
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     * @param \Magento\Quote\Model\Quote\Address\RateResult\ErrorFactory $rateErrorFactory
     * @param \Psr\Log\LoggerInterface $logger
     * @param \Magento\Shipping\Model\Rate\ResultFactory $rateResultFactory
     * @param \Magento\Quote\Model\Quote\Address\RateResult\MethodFactory $rateMethodFactory
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Quote\Model\Quote\Address\RateResult\ErrorFactory $rateErrorFactory,
        \Psr\Log\LoggerInterface $logger,
        \Magento\Shipping\Model\Rate\ResultFactory $rateResultFactory,
        \Magento\Quote\Model\Quote\Address\RateResult\MethodFactory $rateMethodFactory,
        \Magento\Checkout\Model\Cart $cartModel,
        \Magento\Framework\Serialize\Serializer\Json $serialize,

        array $data = []
    ) {
        $this->_rateResultFactory = $rateResultFactory;
        $this->_rateMethodFactory = $rateMethodFactory;
        $this->_logger = $logger;
        $this->serialize = $serialize;
        $this->_cart = $cartModel;
        parent::__construct($scopeConfig, $rateErrorFactory, $logger, $data);
    }

    /**
     * @param RateRequest $request
     * @return \Magento\Shipping\Model\Rate\Result|bool
     */
    public function collectRates(RateRequest $request)
    {
        if (!$this->getConfigFlag('active')) {
            return false;
        }
        $country = $request->getDestCountryId();

        $items = $this->_cart->getQuote()->getAllItems();
        $weight = 0;
        foreach($items as $item) {
            $weight += ($item->getWeight() * $item->getQty()) ;        
        }
        
        $count = $this->getConfigData('activenew');
        $unserializedata = $this->serialize->unserialize($count);
        $gridData = array();
        foreach ($unserializedata as $row) {
            $gridData[] = $row;
        }
        foreach ($gridData as $data) {
            if ($country == $data['custom']) {
                if ($weight >= $data['minweight'] && $weight <= $data['maxweight']) {

                    /** @var \Magento\Shipping\Model\Rate\Result $result */
                    $result = $this->_rateResultFactory->create();

                    $shippingPrice = $data['shippingprice'];
                    $method = $this->_rateMethodFactory->create();
                    $method->setCarrier($this->_code);
                    $method->setCarrierTitle($this->getConfigData('title'));
                    $method->setMethod($this->_code);
                    $method->setMethodTitle($this->getConfigData('name'));
                    $method->setPrice($shippingPrice);
                    $method->setCost($shippingPrice);
                    $result->append($method);

                    return $result;
                }
            }
        }
    }

    /**
     * @return array
     */
    public function getAllowedMethods()
    {
        return [$this->_code => $this->getConfigData('name')];
    }
}

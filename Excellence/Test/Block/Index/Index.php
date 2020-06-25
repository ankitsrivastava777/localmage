<?php

declare(strict_types=1);
use Zend\Log\Filter\Timestamp;

namespace Excellence\Test\Block\Index;

use Magento\Quote\Model\Quote\Address\RateRequest;
use Magento\Shipping\Model\Carrier\AbstractCarrier;
use Magento\Shipping\Model\Carrier\CarrierInterface;
use Exception;
use Magento\Framework\Exception\StateException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Quote\Api\ShippingMethodManagementInterface;

class Index extends \Magento\Framework\View\Element\Template
{

   /**
 * Order Payment
 *
 * @var \Magento\Sales\Model\ResourceModel\Order\Payment\Collection
 */
// protected $_inlineTranslation;
// protected $_transportBuilder;
protected $_scopeConfig;
// protected $_logLoggerInterface;

public function __construct(
    \Magento\Framework\View\Element\Template\Context $context,
    // \Magento\Framework\Translate\Inline\StateInterface $inlineTranslation,
    // \Magento\Framework\Mail\Template\TransportBuilder $transportBuilder,
    \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
    // \Psr\Log\LoggerInterface $loggerInterface,
    array $data = []

) {
    // $this->_inlineTranslation = $inlineTranslation;
    // $this->_transportBuilder = $transportBuilder;
    $this->_scopeConfig = $scopeConfig;
    // $this->_logLoggerInterface = $loggerInterface;
    // $this->messageManager = $context->getMessageManager();
    parent::__construct($context);
}

public function getDatafun()
{
    // $post = $this->getRequest()->getPost();
    // try {
    //     $this->_inlineTranslation->suspend();
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;

        $sentToEmail = $this->_scopeConfig->getValue('paymentfeecustom/config/fee_price', $storeScope);
        // $sender = [
        //     'name' => $sentToName,
        //     'email' => $post['email']
        // ];

        print_r($sentToEmail); exit;

    //     $transport = $this->_transportBuilder
    //         ->setTemplateIdentifier('feedback_email_template')
    //         ->setTemplateOptions(
    //             [
    //                 'area' => 'frontend',
    //                 'store' => \Magento\Store\Model\Store::DEFAULT_STORE_ID,
    //             ]
    //         )
    //         ->setTemplateVars([
    //             'name'  => $post['name'],
    //             'email'  => $post['email'],
    //             'phone'  => $post['phone'],
    //             'message'  => $post['message']
    //         ])
    //         ->setFrom($sender)
    //         ->addTo($sentToEmail)
    //         ->getTransport();

    //     $transport->sendMessage();

    //     $this->_inlineTranslation->resume();
    //     $this->messageManager->addSuccess('Thankyou for your feedback');
    // } catch (\Exception $e) {
    //     $this->messageManager->addError($e->getMessage());
    //     $this->_logLoggerInterface->debug($e->getMessage());
    //     exit;
    // }
    // return $this->resultRedirectFactory->create()->setPath('feedback/index/index');
}
}
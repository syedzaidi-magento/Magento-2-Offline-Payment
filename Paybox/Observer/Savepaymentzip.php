<?php
namespace Heritage\Paybox\Observer;

use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\Event\ObserverInterface;
use Magento\OfflinePayments\Model\Banktransfer;
class Savepaymentzip implements ObserverInterface {
    protected $_inputParamsResolver;
    protected $_quoteRepository;
    protected $logger;
    protected $_state;
    public function __construct(\Magento\Webapi\Controller\Rest\InputParamsResolver $inputParamsResolver, \Magento\Quote\Model\QuoteRepository $quoteRepository, \Psr\Log\LoggerInterface $logger,\Magento\Framework\App\State $state) {
        $this->_inputParamsResolver = $inputParamsResolver;
        $this->_quoteRepository = $quoteRepository;
        $this->logger = $logger;
        $this->_state = $state;
    }
    public function execute(EventObserver $observer) {
        $inputParams = $this->_inputParamsResolver->resolve();
        if($this->_state->getAreaCode() != \Magento\Framework\App\Area::AREA_ADMINHTML){
        foreach ($inputParams as $inputParam) {
            if ($inputParam instanceof \Magento\Quote\Model\Quote\Payment) {
                $paymentData = $inputParam->getData('additional_data');
                $paymentOrder = $observer->getEvent()->getPayment();
                $order = $paymentOrder->getOrder();
                $quote = $this->_quoteRepository->get($order->getQuoteId());
                $paymentQuote = $quote->getPayment();
                $method = $paymentQuote->getMethodInstance()->getCode();
		/*$writer = new \Zend\Log\Writer\Stream(BP . '/var/log/test.log');
		$logger = new \Zend\Log\Logger();
		$logger->addWriter($writer);
		$logger->info($paymentData);*/
                if ($method == "paybox") {
                    if(isset($paymentData['paymentzip'])){
		            $paymentQuote->setData('paymentzip', $paymentData['paymentzip']);
		            $paymentOrder->setData('paymentzip', $paymentData['paymentzip']);
                    }
                    if(isset($paymentData['paymentcard'])){
                        $paymentQuote->setData('paymentcard', $paymentData['paymentcard']);
                        $paymentOrder->setData('paymentcard', $paymentData['paymentcard']);
                        }
                    if(isset($paymentData['paymentname'])){
                            $paymentQuote->setData('paymentname', $paymentData['paymentname']);
                            $paymentOrder->setData('paymentname', $paymentData['paymentname']);
                    }
                    if(isset($paymentData['paymentcvv'])){
                        $paymentQuote->setData('paymentcvv', $paymentData['paymentcvv']);
                        $paymentOrder->setData('paymentcvv', $paymentData['paymentcvv']);
                    }
                    if(isset($paymentData['paymentexp'])){
                        $paymentQuote->setData('paymentexp', $paymentData['paymentexp']);
                        $paymentOrder->setData('paymentexp', $paymentData['paymentexp']);
                    }
                }
            }
        }
       }
    }
}


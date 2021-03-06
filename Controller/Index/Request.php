<?php

namespace Dibs\Flexwin\Controller\Index;

use Magento\Framework\DataObject;

class Request extends \Dibs\Flexwin\Controller\Index
{

    /**
     * @var \Magento\Framework\Data\Form\FormKey\Validator
     */
    protected $formKeyValidator;

    public function __construct(\Magento\Framework\App\Action\Context $context,
                                \Magento\Sales\Model\OrderFactory $orderFactory,
                                \Magento\Checkout\Model\Session $checkoutSession,
                                \Dibs\Flexwin\Model\Method $method,
                                \Magento\Framework\Data\Form\FormKey\Validator $formKeyValidator,
                                \Psr\Log\LoggerInterface $logger) {
        parent::__construct($context, $orderFactory, $checkoutSession, $method, $logger);
        $this->formKeyValidator = $formKeyValidator;
    }

    public function execute()
    {
        if ($this->checkPost() && $this->formKeyValidator->validate($this->_request)) {
            $result = new DataObject();
            $response = $this->getResponse();
            $result->addData($this->method->collectRequestParams());
            return $response->representJson($result->toJson());
        }

    }
}

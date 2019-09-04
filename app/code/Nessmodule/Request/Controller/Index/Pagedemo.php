<?php
namespace Nessmodule\Request\Controller\Index;


class Pagedemo extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    protected $_objectManager;

    /**
     * Pagedemo constructor.
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $pageFactory
     * @param \Nessmodule\Request\Model\RequestFactory $requestFactory
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Framework\ObjectManagerInterface $objectManager
        )
    {
        $this->_objectManager = $objectManager;
        $this->_pageFactory = $pageFactory;


        return parent::__construct($context);
    }

    public function execute()
    {
        $post = $this->getRequest()->getPostValue();
        if(isset($post['oar_billing_lastname']))
        {
            $model = $this->_objectManager->create('Nessmodule\Request\Model\Request');
            $model->setData('message', $post['oar_billing_lastname']);
            $model->save();
        }

        return $this->_pageFactory->create();
    }


}
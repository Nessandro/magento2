<?php
namespace Nessmodule\Request\Model\ResourceModel;
/**
 * Class Request
 * User: Nessandro
 * Date: 2019-09-04
 * Time: 13:28
 */

class Request extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context
    )
    {
        parent::__construct($context);
    }

    protected function _construct()
    {
        /* params dbname + primary key */
        $this->_init('ness_request_question', 'id');

    }

}
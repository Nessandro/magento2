<?php
namespace Nessmodule\Request\Model\ResourceModel\Request;
/**
 * Class Collection
 * User: Nessandro
 * Date: 2019-09-04
 * Time: 13:32
 */

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'mock';
    protected $_eventPrefix = 'ness_request_question';
    protected $_eventObject = 'request_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Nessmodule\Request\Model\Request', 'Nessmodule\Request\Model\ResourceModel\Request');
    }
}
<?php
namespace Nessmodule\Request\Model;
/**
 * Class Request
 * User: Nessandro
 * Date: 2019-09-04
 * Time: 12:51
 */

class Request extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    /**
     *
     */
    const CACHE_TAG = 'ness_request_question';

    /**
     * @var string
     */
    protected $_cacheTag = 'ness_request_question';

    /**
     * @description a prefix for events to be triggered
     * @var string
     */
    protected $_eventPrefix = 'ness_request_question';

    /**
     *
     */
    protected function _construct()
    {
        /**
         * define resource model which will actually fetch the information
         */
        $this->_init('Nessmodule\Request\Model\ResourceModel\Request');
    }

    /**
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * @return array
     */
    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}
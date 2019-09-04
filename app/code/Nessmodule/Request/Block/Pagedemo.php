<?php
/**
 * Class Demo
 * User: Nessandro
 * Date: 2019-08-30
 * Time: 17:38
 * @package Nessmodule\Request\Block
 */

namespace Nessmodule\Request\Block;


use Nessmodule\Request\Model\Request;

class Pagedemo extends \Magento\Framework\View\Element\Template
{
    protected $_requestFactory;
    public function __construct(\Magento\Framework\View\Element\Template\Context $context,
                                \Nessmodule\Request\Model\RequestFactory $requestFactory)
    {

        $this->_requestFactory = $requestFactory;
        parent::__construct($context);
    }

    public function sayHello()
    {
        return __('Hello World');
    }


    public function getRequestData()
    {
        $post = $this->_requestFactory->create();
        $collection = $post->getCollection();

        return $collection;
    }
    public function showContent()
    {

        return "
        
        <main id=\"maincontent\" class=\"page-main\"><a id=\"contentarea\" tabindex=\"-1\"></a>
    <div class=\"page-title-wrapper\">
        <h1 class=\"page-title\">
            <span class=\"base\" data-ui-id=\"page-title-wrapper\">Provide your request</span></h1>
    </div>
    <div class=\"page messages\">
        <div data-placeholder=\"messages\"></div>
        <div data-bind=\"scope: 'messages'\">
        </div>
    </div>
    <div class=\"columns\">
        <div class=\"column main\">
            <div id=\"authenticationPopup\" data-bind=\"scope:'authenticationPopup'\" style=\"display: none;\">
            </div>
            <form class=\"form form-orders-search\" id=\"oar-widget-orders-and-returns-form\" action=\"\" method=\"post\"
                  name=\"guest_post\" novalidate=\"novalidate\">
                <fieldset class=\"fieldset\">
                    <legend class=\"legend\"><span>Request Form</span></legend>
                    <br>
                    <div class=\"field lastname required\">
                        <label class=\"label\" for=\"oar-billing-lastname\"><span>Request</span></label>

                        <div class=\"control\">
                            <input type=\"text\" class=\"input-text\" id=\"oar-billing-lastname\" name=\"oar_billing_lastname\"
                                   data-validate=\"{required:true}\" aria-required=\"true\">
                        </div>
                    </div>

                </fieldset>
                <div class=\"actions-toolbar\">
                    <div class=\"primary\">
                        <button type=\"submit\" title=\"Continue\" class=\"action submit primary\">
                            <span>Continue</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>";
    }
}
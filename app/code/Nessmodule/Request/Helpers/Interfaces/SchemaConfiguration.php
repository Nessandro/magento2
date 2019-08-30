<?php
namespace Nessmodule\Request\Helpers\Interfaces;
/**
 * Class SchemaConfiguration
 * User: Nessandro
 * Date: 2019-08-30
 * Time: 18:07
 */

interface SchemaConfiguration
{

    /**
     * @description function will been runed
     * @return mixed
     */
    public function config();

    /**
     * @description function checks if requirements have been accepted
     * @return mixed
     */
    public function requirements();

    /**
     * @description process of run schema
     * @return mixed
     */
    public function process();

}
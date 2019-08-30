<?php

namespace Nessmodule\Request\Setup;

use Nessmodule\Request\Helpers\Models\Column;
use Nessmodule\Request\Helpers\Setup\AbstractSchema;

class InstallSchema extends AbstractSchema
{

    /**
     * @description function will been runed
     * @return mixed
     */
    public function config()
    {
        $this->setTableName('ness_request_question');
        $this->setComment('This table stores each request questions ');

        $column = new Column();
        $column->setName('mock');
        $column->setType(\Magento\Framework\DB\Ddl\Table::TYPE_TEXT);
        $column->setSize(255);
        $column->setOptions(['nullable' => false]);
        $column->setComment('This is mock column');

        $this->addColumn($column);


    }
}

<?php

namespace Nessmodule\Request\Setup;

use Nessmodule\Request\Helpers\Setup\AbstractSchema;
use Nessmodule\Request\Helpers\Setup\Models\Column;

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
        $column->setName('id');
        $column->setType(\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER);
        $column->setSize(11);
        $column->setOptions([
            'identity' => true,
            'nullable' => false,
            'primary'  => true,
            'unsigned' => true,]);
        $column->setComment('request identity');

        $this->addColumn($column);

        $column = new Column();
        $column->setName('message');
        $column->setType(\Magento\Framework\DB\Ddl\Table::TYPE_TEXT);
        $column->setSize(255);
        $column->setOptions(['nullable' => false,]);
        $column->setComment('request message');

        $this->addColumn($column);


    }
}

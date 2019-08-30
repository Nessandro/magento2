<?php
/**
 * Class AbstractSchema
 * User: Nessandro
 * Date: 2019-08-30
 * Time: 18:05
 */

namespace Nessmodule\Request\Helpers\Setup;

use \Nessmodule\Request\Helpers\Interfaces\SchemaConfiguration;
use \Magento\Framework\Setup\InstallSchemaInterface;
use \Magento\Framework\Setup\SchemaSetupInterface;
use \Magento\Framework\Setup\ModuleContextInterface;
use Nessmodule\Request\Helpers\Models\Column;

abstract class AbstractSchema implements InstallSchemaInterface, SchemaConfiguration
{
    /**
     * @var SchemaSetupInterface
     */
    protected $installe;

    /**
     * @var SchemaSetupInterface
     */
    protected $setup;

    /**
     * @var string
     */
    protected $tableName;

    /**
     * @var string
     */
    protected $comment;

    /**
     * @var array
     */
    protected $columnCollection = [];

    /**
     * @param $name
     * @return $this
     */
    public function setTableName($name)
    {
        $this->tableName = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTableName()
    {
        return $this->tableName;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }



    /**
     * @param Column $column
     * @return $this
     */
    public function addColumn(Column $column)
    {
        $this->columnCollection[$column->getName()] = $column;

        return $this;
    }

    /**
     * @description Magento install function
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function install(SchemaSetupInterface $setup,ModuleContextInterface  $context)
    {
        /**
         * stores setup obiect
         */
        $this->installer = $setup;
        $this->setup = $setup;

        /**
         * configure table
         */
        $this->config();

        /**
         *  start of installation proccess
         */
        $this->installer->startSetup();

        /**
         * check requirements & run process
         */
        if($this->requirements())
        {
            $this->process();
        }

        /**
         * end of installation setup
         */
        $this->installer->endSetup();
    }

    /**
     * @return bool|mixed
     */
    public function requirements()
    {
        /**
         * check if table name isset else return false
         */
        if($this->tableName)
        {
            return false;
        }

        /**
         * if table exists return false
         */
        if($this->installer->tableExists($this->getTableName()))
        {
            return false;
        }

        /**
         * return true if process should be started
         */
        return true;
    }

    /**
     * @return mixed|void
     */
    public function process()
    {
        /**
         * get connection
         */
        $connection = $this->installer->getConnection();

        /**
         * define name of new table
         */
        $table  = $connection->newTable($this->installer->getTable($this->getTableName()));

        /**
         * set table comment
         */
        $table->setComment($this->getComment());

        /**
         * add colums
         */
        foreach ($this->columnCollection as $column)
        {
            /* @var $column Column*/

            $table->addColumn(
                $column->getName(),
                $column->getType(),
                $column->getSize(),
                $column->getOptions(),
                $column->getComment()
            );
        }

        /**
         * create table
         */
        $connection->createTable($table);

        //todo add index tables

//        $this->installer->getConnection()->addIndex(
//
//            $this->installer->getTable($this->getTableName()),
//
//            $this->setup->getIdxName(
//                $this->installer->getTable($this->getTableName()),
//                ['name','url_key','post_content','tags','featured_image'],
//                \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
//            ),
//            ['name','url_key','post_content','tags','featured_image'],
//            \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
//        );
    }

}
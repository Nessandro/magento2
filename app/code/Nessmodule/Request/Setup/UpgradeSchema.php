<?php
/**
 * Class UpgradeSchema
 * User: Nessandro
 * Date: 2019-09-04
 * Time: 12:29
 * @package Nessmodule\Request\Setup
 */

namespace Nessmodule\Request\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{

    /**
     * @description upgrade module schema
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function upgrade( SchemaSetupInterface $setup, ModuleContextInterface $context )
    {
        if(version_compare($context->getVersion(), '1.1.0', '<'))
        {
            //todo upgrade schema per version

        }
    }
}
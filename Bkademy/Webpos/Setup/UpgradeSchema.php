<?php
/**
 * Created by PhpStorm.
 * User: anhnc
 * Date: 23/01/2017
 * Time: 10:17
 */

namespace Bkademy\Webpos\Setup;
use Magento\Framework\Setup\ModuleContextInterface;

use Magento\Framework\Setup\SchemaSetupInterface;

use Magento\Framework\Setup\UpgradeSchemaInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface

    $context)

    {

        $installer = $setup;

        $installer->startSetup();

    if (version_compare($context->getVersion(),'2.0.0','<')) {
    
    $setup->getConnection()->addColumn(
            $setup->getTable('webpos_staff'),
            'age',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT
    );
    
    // your update code ...
    
    }
    
    $installer->endSetup();
    
    }   
}
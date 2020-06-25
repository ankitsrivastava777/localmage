<?php
/**
 * Copyright © 2015 Excellence. All rights reserved.
 */

namespace Excellence\ShippingMethodNewCustom\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
	
        $installer = $setup;

        $installer->startSetup();

		/**
         * Create table 'shippingmethodnewcustom_shipping'
         */
        $table = $installer->getConnection()->newTable(
            $installer->getTable('shippingmethodnewcustom_shipping')
        )
		->addColumn(
            'id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'shippingmethodnewcustom_shipping'
        )
		->addColumn(
            'shippingprice',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '64k',
            [],
            'shippingprice'
        )
		->addColumn(
            'country',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '64k',
            [],
            'country'
        )
		->addColumn(
            'zipcode',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '64k',
            [],
            'zipcode'
        )
		->addColumn(
            'maxallowedweight',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '64k',
            [],
            'maxallowedweight'
        )
		/*{{CedAddTableColumn}}}*/
		
		
        ->setComment(
            'Excellence ShippingMethodNewCustom shippingmethodnewcustom_shipping'
        );
		
		$installer->getConnection()->createTable($table);
		/*{{CedAddTable}}*/

        $installer->endSetup();

    }
}

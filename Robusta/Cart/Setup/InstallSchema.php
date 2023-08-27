<?php
namespace Robusta\Cart\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{

    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        $this->addDeliveryDateColumn($setup);

        $installer->endSetup();
    }

    /**
     * Add the column named delivery_date
     *
     * @param SchemaSetupInterface $setup
     *
     * @return void
     */
    private function addCommentColumn(SchemaSetupInterface $setup)
    {
        $customerComment = [
            'type' => Table::TYPE_TEXT,
            'default' => '',
            'nullable' => true,
            'comment' => 'Customer Comment'
        ];

        $setup->getConnection()->addColumn(
            $setup->getTable('sales_order_address'),
            'customer_comment',
            $customerComment
        );

        $setup->getConnection()->addColumn(
            $setup->getTable('quote_address'),
            'customer_comment',
            $customerComment
        );
    }
}
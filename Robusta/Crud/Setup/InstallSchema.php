<?php

declare(strict_types=1);

namespace Robusta\Crud\Steup;

use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\Data\Tree\Db;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;



class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup , ModuleContextInterface $context){
        $installer = $setup;
        $installer->startSetup();

        $connection = $installer->getConnection();



        $categoryTable = $installer->getTable('category_table');
        if (!$connection->isTableExists($categoryTable)) {
            $categoryTable = $connection->newTable($categoryTable)
                ->addColumn('cat_id', Table::TYPE_INTEGER , null , [
                'primary' => true,
                'identity' => true,
                'nullable' => false,
                ])
                ->addColumn('name' , Table::TYPE_TEXT , 124 , [
                    'nullable' => false,
                ])
                ->setComment('Categories Table');
            $connection->createTable($categoryTable);
        }

        $faqTable = $installer->getTable('faq_table');
        if (!$connection->isTableExists($faqTable)) {
            $faqTable = $connection->newTable($faqTable)
                ->addColumn('id' , Table::TYPE_INTEGER , null , [
                    'primary' => true,
                    'nullable' => false,
                    'identity' => true,
                ])

                ->addColumn('question' , Table::TYPE_TEXT , null , [
                    'nullable' => false,
                ])

                ->addColumn('answer' , Table::TYPE_TEXT , null ,[
                    'default' => '',
                ])
                ->addColumn('category_id' , Table::TYPE_INTEGER , null , [] )
                ->addForeignKey(
                    $setup->getFkName('faq_table' , 'category_id' , 'categroty_table' , 'cat_id'),
                    'category_id',
                    'category_table',
                    'cat_id',
                    AdapterInterface::FK_ACTION_CASCADE
                )
                ->setComment('FAQs Table');
            $connection->createTable($faqTable);
        }

        $installer->endSetup();
    }
}
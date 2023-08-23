<?php

declare(strict_types=1);

namespace Robusta\Crud\Steup;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;



class UpgardeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup , ModuleContextInterface $context){
        echo __METHOD__ . PHP_EOL;
    }
}
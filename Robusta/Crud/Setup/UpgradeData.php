<?php

declare(strict_types=1);

namespace Robusta\Crud\Steup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

class UpgardeData implements UpgradeDataInterface{

    public function upgrade(ModuleDataSetupInterface $setup , ModuleContextInterface $context){
        echo __METHOD__ . PHP_EOL;

    }
}
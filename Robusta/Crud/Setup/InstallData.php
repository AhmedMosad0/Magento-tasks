<?php

declare(strict_types=1);

namespace Robusta\Crud\Steup;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;


class InstallData implements InstallDataInterface
{
    public function install(ModuleDataSetupInterface $setup ,ModuleContextInterface $context ){
        echo __METHOD__ . PHP_EOL;
    }
}
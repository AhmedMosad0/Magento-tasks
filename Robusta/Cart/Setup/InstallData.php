<?php
namespace Robusta\Cart\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Customer\Setup\CustomerSetupFactory;


class InstallData implements InstallDataInterface
{

    private $customerSetupFactory;

    public function __construct(
        CustomerSetupFactory $customerSetupFactory
    ) {
        $this->customerSetupFactory = $customerSetupFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $this->addCustomerCommentAttribute($setup);
    }

    /**
     * Add the address delivery_date attribute
     *
     * @return void
     */
    protected function addCustomerCommentAttribute(ModuleDataSetupInterface $setup)
    {
        /** @var CustomerSetup $customerSetup */
        $customerSetup = $this->customerSetupFactory->create(['setup' => $setup]);

        if (!$customerSetup->getAttributeId('customer_address', 'customer_comment')) {
            $customerSetup->addAttribute('customer_address', 'customer_comment', [
                'type' => 'varchar',
                'label' => 'Comment',
                'input' => 'hidden',
                'required' => false,
                'visible' => true,
                'system' => 0,
                'visible_on_front' => false,
                'sort_order' => 101,
                'position' => 101
            ]);
        }
    }
}
<?php
namespace Robusta\Cart\Plugin\Block\Checkout;

class LayoutProcessor
{
    /**
     * Process js Layout of block
     *
     * @param \Magento\Checkout\Block\Checkout\LayoutProcessor $subject
     * @param array $jsLayout
     * @return array
     */
    public function afterProcess(\Magento\Checkout\Block\Checkout\LayoutProcessor $subject, $jsLayout)
    {
        $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']['shippingAddress']['children']['shipping-address-fieldset']['children']['customer_comment'] = $this->processCustomerComment('shippingAddress');

        return $jsLayout;
    }

    /**
     * Process provided address.
     *
     * @param string $dataScopePrefix
     * @return array
     */
    private function processCustomerComment($dataScopePrefix)
    {
        return [
            'component' => 'Magento_Ui/js/form/element/date',
            'config' => [
                'customScope' => $dataScopePrefix.'.custom_attributes',
                'customEntry' => null,
                'template' => 'ui/form/field',
                'elementTmpl' => 'ui/form/element/text',
                'id' => 'customer_comment',
                'options' => [
                    'text'
                ]
            ],
            'dataScope' => $dataScopePrefix.'.custom_attributes.customer_comment',
            'label' => __('Comment'),
            'provider' => 'checkoutProvider',
            'validation' => [
               'required-entry' => false
            ],
            'sortOrder' => 201,
            'visible' => true,
            'imports' => [
                'initialOptions' => 'index = checkoutProvider:dictionaries.customer_comment',
                'setOptions' => 'index = checkoutProvider:dictionaries.customer_comment'
            ]
        ];
    }
}
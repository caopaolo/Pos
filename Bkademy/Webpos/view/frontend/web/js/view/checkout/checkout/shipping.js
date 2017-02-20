define(
    [
        'jquery',
        'ko',
        'uiComponent',
        'Bkademy_Webpos/js/model/checkout/checkout/shipping',
        'Magento_Catalog/js/price-utils'
    ],
    function ($, ko, Component, ShippingModel, PriceUtils) {
        "use strict";
        return Component.extend({
            /**
             * Default data
             */
            defaults: {
                template: 'Bkademy_Webpos/checkout/checkout/shipping',
            },
            /**
             * Shipping list
             */
            items: ShippingModel.items,
            /**
             * Check if shipping is selected
             */
            isSelected: ShippingModel.isSelected,
            /**
             * Save shipping method
             * @param data
             */
            setShippingMethod: function (data) {
                ShippingModel.saveShippingMethod(data);
            },
            /**
             * Format price
             * @param value
             * @returns {*}
             */
            formatPrice: function(value){
                return PriceUtils.formatPrice(value, window.webposConfig.priceFormat);
            }
        });
    }
);

define(
    [
        'jquery',
        'ko',
        'uiComponent',
        'Bkademy_Webpos/js/model/checkout/checkout/payment'
    ],
    function ($, ko, Component, PaymentModel) {
        "use strict";
        return Component.extend({
            defaults: {
                template: 'Bkademy_Webpos/checkout/checkout/payment',
            },
            items: PaymentModel.items,
            visible: ko.observable(true),
            initialize: function () {
                this._super();
                this.initObserver();
            },
            initObserver: function(){
                var self = this;
            },
            setPaymentMethod: function (data) {
                PaymentModel.setPaymentMethod(data);
            }
        });
    }
);

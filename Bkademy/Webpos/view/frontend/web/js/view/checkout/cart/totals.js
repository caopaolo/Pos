define([
    'ko',
    'jquery',
    'uiComponent',
    'Bkademy_Webpos/js/model/checkout/cart',
    'Bkademy_Webpos/js/model/checkout/cart/totals',
    'Bkademy_Webpos/js/model/checkout/cart/items',
    'Bkademy_Webpos/js/model/event-manager'
], function (ko, $, Component, CartModel, Totals, Items, Event) {
    'use strict';

    return Component.extend({
        defaults: {
            template: 'Bkademy_Webpos/checkout/cart/totals'
        },
        isZeroTotal: ko.pureComputed(function(){
            return (Totals.grandTotal())?false:true;
        }),
        isOnCartPage: ko.pureComputed(function(){
            return (CartModel.currentPage() == CartModel.PAGE.CART)?true:false;
        }),
        isOnCheckoutPage: ko.pureComputed(function(){
            return (CartModel.currentPage() == CartModel.PAGE.CHECKOUT)?true:false;
        }),
        totals: Totals.totals,
        backToCart: function(){
            Event.dispatch('go_to_cart_page', '', true);
        },
        saveCart: function(){
            if(Items.isEmpty()){
                alert("Please add item(s) to cart!");
            }else{
                CartModel.saveQuoteBeforeCheckout();
            }
        }
    });
});

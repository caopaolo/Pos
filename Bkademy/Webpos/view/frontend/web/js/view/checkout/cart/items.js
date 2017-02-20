define([
    'ko',
    'jquery',
    'uiComponent',
    'Bkademy_Webpos/js/model/checkout/cart',
    'Bkademy_Webpos/js/model/checkout/cart/items'
], function (ko, $, Component, CartModel, Items) {
    'use strict';

    return Component.extend({
        defaults: {
            template: 'Bkademy_Webpos/checkout/cart/items'
        },
        initialize: function () {
            this._super();
            this.isOnCartPage = ko.pureComputed(function(){
                return (CartModel.currentPage() == CartModel.PAGE.CART)?true:false;
            });
            this.isOnCheckoutPage = ko.pureComputed(function(){
                return (CartModel.currentPage() == CartModel.PAGE.CHECKOUT)?true:false;
            });
        },
        getItems: function(){
            return Items.items();
        },
        prepareEditData: function(item,event){

        },
        remove: function(item, event){
            if(item.saved_item()){
                CartModel.removeQuoteItem(item.item_id());
            }else{
                CartModel.removeItem(item.item_id());
            }
        }
    });
});

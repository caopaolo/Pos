define(
    [
        'jquery',
        'ko',
        'uiComponent',
        'Bkademy_Webpos/js/model/catalog/product/detail-popup',
        'Bkademy_Webpos/js/model/checkout/cart/items',
        'Bkademy_Webpos/js/model/checkout/cart',
    ],
    function ($, ko, Component, detailPopup,Items,Cart) {
        "use strict";
        return Component.extend({
            itemData: ko.pureComputed(function () {
                // console.log(detailPopup.itemData());
                return detailPopup.itemData();
            }),
                // itemData : reference with element knockout  from detail-popup model
            defaults: {
                template: 'Bkademy_Webpos/catalog/product/detail-popup'
            },
            // qtyAddToCart: ko.observable(1),
            qtyAddToCart: ko.observable(1),
            focusQtyInput: true,
            data: ko.pureComputed(function () {
                return detailPopup.itemData();
            }),
            initialize: function () {

                this._super();
                // console.log(detailPopup.itemData());
            },

            incQty: function(){
                var qty = this.getQtyAddToCart();
                this.qtyAddToCart(++qty);
            },
            isShowAvailableQty: function(stock){
                if(stock === 0){
                    return false;
                }else return true;
            },

            descQty: function(item){
                var qty = this.getQtyAddToCart();
                this.qtyAddToCart(--qty);
            },
            getQtyFromCart: function (itemId) {
                var cartItems = Cart.getItemsInfo();
                console.log(cartItems);
                var qty;
                if(cartItems){
                    ko.utils.arrayForEach(cartItems, function(item) {
                        if(item.id == itemId){
                            qty = item.qty;
                        }
                    });
                }
                console.log(qty);
                return qty;

            },
            getQtyAddToCart: function(){
                // console.log(this.itemData().stock);
                if (this.qtyAddToCart() <= 1 || isNaN(this.qtyAddToCart())) {
                    return 1;
                }
                else if (this.qtyAddToCart() > this.itemData().stock) {
                    return this.itemData().stock;
                }
                return this.qtyAddToCart();
            },
            // getQtyAddToCart: function(data){
            //     console.log(data.id);
            //     var qty = this.getQtyFromCart(data.id);
            //     this.qtyAddToCart = qty;
            //     return this.qtyAddToCart;
            // },
            prepareAddToCart: function() {
                var self = this;
                var data = self.itemData();
             var qty =self.qtyAddToCart() - self.getQtyFromCart(data.id);
                // console.log(qty);
                var infoBuy = {
                    'product_id': data.id,
                    'name': data.name,
                    'qty': qty,
                    'unit_price': data.price,
                    'image_url': data.image,
                    'is_virtual': false
                };
                console.log(infoBuy);
                // if(data.stock === 0){
                //     alert('Out of stock Product');
                //     return false;
                 Cart.addProduct(infoBuy);

            },
            modifyQty: function(data,event){
                this.getQtyAddToCart();
                this.qtyAddToCart(parseFloat(event.target.value));
            },
            closeDetailPopup: function() {
                $("#popup-product-detail").hide();
                $(".wrap-backover").hide();
                $('.notification-bell').show();
                $('#c-button--push-left').show();
            },
        });
    }
);

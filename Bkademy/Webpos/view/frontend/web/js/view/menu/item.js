/*
 *  Copyright © 2016 Magestore. All rights reserved.
 *  See COPYING.txt for license details.
 *
 */

define(
    [
        'uiComponent',
        'Bkademy_Webpos/js/model/container'
    ],
    function (Component, Container) {
        "use strict";
        return Component.extend({
            defaults: {
                template: 'Bkademy_Webpos/menu/item'
            },
            /**
             * Constructor
             */
            initialize: function () {
                this._super();
                if (!this.data) {
                    this.data = {};
                }
                if (!this.data.container) {
                    this.data.container = this.data.id + '_container';
                }
            },
            /**
             * Action when click menu item
             * @param item
             */
            itemClick: function (item) {
                var containerId = item.data.container;
                Container.toggleArea(containerId);
            }
        });
    }
);

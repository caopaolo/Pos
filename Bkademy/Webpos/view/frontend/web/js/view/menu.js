/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
define([
    'uiComponent',
    'Bkademy_Webpos/js/model/url-builder',
    'mage/storage',
], function (Component, urlBuilder, storage) {
    'use strict';

    return Component.extend({
        defaults: {
            template: 'Bkademy_Webpos/menu'
        },
        logout: function(){
            var serviceUrl,
                payload;
            // serviceUrl = '/m2/rest/default/V1/webpos/staff/logout';
            serviceUrl = urlBuilder.createUrl('/webpos/staff/logout', {});
            return storage.post(
                serviceUrl, JSON.stringify(payload)
            ).done(
                function (response) {
                    window.location.reload();
                }
            );
        }
    });
});

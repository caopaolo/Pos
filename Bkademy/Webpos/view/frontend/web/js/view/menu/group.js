/*
 *  Copyright © 2016 Magestore. All rights reserved.
 *  See COPYING.txt for license details.
 *
 */

define(
    [
        'uiComponent'
    ],
    function (Component) {
        "use strict";
        return Component.extend({
            defaults: {
                template: 'Bkademy_Webpos/menu/group'
            },
            hasChilds: function(){
                return (this.elems().length > 0)?true:false;
            }
        });
    }
);
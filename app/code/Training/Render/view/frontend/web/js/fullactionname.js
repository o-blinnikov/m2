/**
 * Copyright © 2013-2017 Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
/*jshint browser:true jquery:true expr:true*/
define([
    'jquery'
], function ($) {
    'use strict';

    $.widget('custom.fullActionName', {
        options: {
            container: 'container',
            fan: 'fan'
        },

        /**
         * Create widget
         * @private
         */
        _create: function () {
            this._showFullActionName();
        },

        /**
         * Show Full Action Name
         * @private
         */
        _showFullActionName: function () {
            $(this.options.container).html(this.options.fan);
        }
    });

    return $.custom.fullActionName;
});
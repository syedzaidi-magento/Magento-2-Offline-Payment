/*browser:true*/
/*global define*/
define(
    [
        'ko',
        'Magento_Checkout/js/view/payment/default',
        'jquery'
    ],
    function (ko, Component,$) {
        'use strict';

        return Component.extend({
            defaults: {
                template: 'Heritage_Paybox/payment/paybox'
            },

            /** Returns send check to info */
            getMailingAddress: function() {
                //console.log('--getMailingAddress--');
                return window.checkoutConfig.payment.paybox.mailingAddress;
                //return 'john@change.me';
            },

	    initialize: function () {
                    this._super()
                            .observe(
                                    [   'paymentname',
                                        'paymentzip',
                                        'paymentcvv',
                                        'paymentexp',
                                        'paymentcard'
                                    ]
                                    );
                    return this;
                },

	    getData: function() {
                return {
                    'method': this.item.method,
                    'additional_data': {
                        'paymentname': $('#paybox_paymentname').val(),
                        'paymentzip': $('#paybox_paymentzip').val(),
                        'paymentcvv': $('#paybox_paymentcvv').val(),
                        'paymentexp': $('#paybox_paymentexp').val(),
			            'paymentcard': $('#paybox_paymentcard').val()
                    }
                };
            },

            /** Returns payable to info */
            getPayableTo: function() {
                //console.log('--getPayableTo--');
                return window.checkoutConfig.payment.paybox.payableTo;
                //return 'John';
            }
        });
    }
);

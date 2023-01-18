/* globals Chart:false, feather:false */

(function () {
    'use strict'
})()

function shortingText(value) {
    if (value.length <= 30) {
        return value;
    }

    return value.substring(0, 30) + '...';

}

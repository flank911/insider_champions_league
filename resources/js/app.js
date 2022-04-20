import Vue from 'vue';
require('./bootstrap');
import VueRouter from 'vue-router';
import router from './routes';
import Header from './components/Header.vue';
import api from './api/index.js';

Vue.use(VueRouter);

Vue.prototype.$api = api;

Vue.mixin({
    methods: {
        formatNumber(value, decimals = 2, decPoint = '.', thousandsSep = ',') {
            value = (value + '').replace(/[^0-9+\-Ee.]/g, '');
            let n = !isFinite(+value) ?
                0 :
                +value;
            let precision = !isFinite(+decimals) ?
                0 :
                Math.abs(decimals);
            let sep = (typeof thousandsSep === 'undefined') ?
                ',' :
                thousandsSep;
            let dec = (typeof decPoint === 'undefined') ?
                '.' :
                decPoint;
            let s = '';
            let toFixedFix = function (n, prec) {
                var k = Math.pow(10, prec);
                return '' + (
                    Math.round(n * k) / k).toFixed(prec);
            };
            s = (
                precision ?
                    toFixedFix(n, precision) :
                    '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < precision) {
                s[1] = s[1] || '';
                s[1] += new Array(precision - s[1].length + 1).join('0');
            }
            return s.join(dec);
        },
        ordinal(week) {
            let j = week % 10,
                k = week % 100;
            if (j === 1 && k !== 11) {
                return "st";
            }
            if (j === 2 && k !== 12) {
                return "nd";
            }
            if (j === 3 && k !== 13) {
                return "rd";
            }

            return "th";
        }
    }
});

new Vue({
    el: '#app',

    components: {VueHeader: Header},

    router,

    mounted() {

    }
});

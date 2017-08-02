
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


Vue.component('search-filter', require('./components/SearchFilter.vue'));
Vue.component('tournament', require('./components/Tournament.vue'));
Vue.component('tournaments', require('./components/Tournaments.vue'));
Vue.component('autocomplete', require('./components/AutoComplete.vue'));

let app = new Vue({
	el: '#app'
});

$('[data-toggle="off-canvas"]').on('click', function () {
	let attribute = $('.navbar').find($(this).attr('data-target'));
	let	e = attribute.hasClass('collapse');

	attribute[ (e ? 'remove' : 'add') + 'Class' ]('collapse'),
		$('.navbar')[ (e ? 'add' : 'remove') + 'Class' ]('is-open');
});


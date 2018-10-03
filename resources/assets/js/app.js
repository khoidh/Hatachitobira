/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.$ = window.jQuery = require('jquery');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
if (window.innerWidth > 993) {
    window.onscroll = function() { myFunction() };
}
// Get the header
var header = document.getElementById("myHeader");

// Get the offset position of the navbar
var sticky = header.offsetTop;

// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {

    if (window.pageYOffset > sticky) {
        header.classList.add("fixed");
        $('.navbar.navbar-expand-lg.navbar-light').removeClass('flex-column');
        $('.navbar-nav.mr-auto').removeClass('flex-column');
    } else {
        header.classList.remove("fixed");
        $('.navbar.navbar-expand-lg.navbar-light').addClass('flex-column');
        $('.navbar-nav.mr-auto').addClass('flex-column');
    }

}

if (window.innerWidth < 993) {
    console.log('aaa');
    header.classList.add("fixed");
    $('.navbar.navbar-expand-lg.navbar-light').removeClass('flex-column');
    $('.navbar-nav.mr-auto').removeClass('flex-column');
}

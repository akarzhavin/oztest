
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('jquery');



$( "#addProduct" ).click(function() {
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
    $.ajax({
        type: 'POST',
        url: window.location.pathname,
        success: function(data){
            alert( JSON.parse(data)['message'] );
        },
        error: function(data){
            alert( JSON.parse(data)['message'] );
        }
    });
});
import './bootstrap.js';
const $ = require('jquery');

global.$ = global.jQuery = $;
import 'bootstrap/dist/js/bootstrap.bundle.min';
import 'bootstrap/dist/css/bootstrap.min.css';
// var $ = require("jquery");

// global.$ = global.jQuery = $;
import './styles/app.css';
import './styles/vente.css';

$(document).ready(function() {
    console.log("jQuery is working!");
});
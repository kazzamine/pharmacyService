import './bootstrap.js';
const $ = require('jquery');

global.$ = global.jQuery = $;
import 'bootstrap/dist/js/bootstrap.bundle.min';
import 'bootstrap/dist/css/bootstrap.min.css';

import toastr from 'toastr';
import 'toastr/build/toastr.min.css';
window.toastr = toastr;

import './styles/app.css';
import './styles/vente.css';
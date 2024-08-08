import './bootstrap.js';
const $ = require('jquery');

global.$ = global.jQuery = $;
import 'bootstrap/dist/js/bootstrap.bundle.min';
import 'bootstrap/dist/css/bootstrap.min.css';

import toastr from 'toastr';
import 'toastr/build/toastr.min.css';
window.toastr = toastr;
import select2 from 'select2';
import 'select2/dist/css/select2.css';

import './styles/app.css';
import './styles/vente.css';
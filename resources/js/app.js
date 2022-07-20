require('./bootstrap');

import "bootstrap";

window.bootstrap = require('bootstrap');

import { createApp } from "vue"

import VCalendar from 'v-calendar';
import { Skeletor } from 'vue-skeletor';
import axios from 'axios';

import 'v-calendar/dist/style.css';

import store from './store/index';

import AppHeader from "./components/layouts/AppHeader";
import AppFooter from "./components/layouts/AppFooter";
import SearchingBarComponent from "./components/tools/SearchingBarComponent";
import TripComponent from "./components/trips/TripComponent";
import TripCheckoutComponent from "./components/trips/TripCheckoutComponent";
import TripsComponent from "./components/trips/TripsComponent";
import FiltersComponent from "./components/tools/FiltersComponent";
import RegisterComponent from "./components/auth/RegisterComponent";
import AddTripComponent from "./components/trips/AddTripComponent";
import LoginComponent from "./components/auth/LoginComponent";

const app = createApp({});

app.component('app-header', AppHeader);
app.component('app-footer', AppFooter);
app.component('searching-bar-component', SearchingBarComponent);
app.component('trip-component', TripComponent);
app.component('trip-checkout-component', TripCheckoutComponent);
app.component('trips-component', TripsComponent);
app.component('filters-component', FiltersComponent);
app.component('register-component', RegisterComponent);
app.component('add-trip-component', AddTripComponent);
app.component('login-component', LoginComponent);
app.component(Skeletor.name, Skeletor);

app.use(VCalendar);

app.use(store);

app.config.globalProperties.axios=axios

app.mount('#app');

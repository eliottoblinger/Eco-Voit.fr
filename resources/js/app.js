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
import SearchingBar from "./components/ui/SearchingBar";
import TripContainer from "./components/ui/TripContainer";
import TripCheckout from "./components/ui/TripCheckout";
import TripsContainer from "./components/ui/TripsContainer";
import FiltersContainer from "./components/ui/FiltersContainer";
import RegisterContainer from "./components/ui/RegisterContainer";
import AddTripComponent from "./components/trips/AddTripComponent";

const app = createApp({});

app.component('app-header', AppHeader);
app.component('app-footer', AppFooter);
app.component('searching-bar', SearchingBar);
app.component('trip-container', TripContainer);
app.component('trip-checkout', TripCheckout);
app.component('trips-container', TripsContainer);
app.component('filters-container', FiltersContainer);
app.component('register-container', RegisterContainer);
app.component('add-trip-component', AddTripComponent);
app.component(Skeletor.name, Skeletor);

app.use(VCalendar);

app.use(store);

app.config.globalProperties.axios=axios

app.mount('#app');

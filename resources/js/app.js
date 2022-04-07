require('./bootstrap');

import "bootstrap";

import { createApp } from "vue"

import VCalendar from 'v-calendar';
import { Skeletor } from 'vue-skeletor';

import 'v-calendar/dist/style.css';
import 'vue-skeletor/dist/vue-skeletor.css';

import store from './store/index'

import AppHeader from "./components/layouts/AppHeader"
import SearchingBar from "./components/ui/SearchingBar"
import TripContainer from "./components/ui/TripContainer"
import TripsContainer from "./components/ui/TripsContainer"
import FiltersContainer from "./components/ui/FiltersContainer"
import RegisterContainer from "./components/ui/RegisterContainer"

const app = createApp({})

app.component('app-header', AppHeader)
app.component('searching-bar', SearchingBar)
app.component('trip-container', TripContainer)
app.component('trips-container', TripsContainer)
app.component('filters-container', FiltersContainer)
app.component('register-container', RegisterContainer)
app.component(Skeletor.name, Skeletor)

app.use(VCalendar)

app.use(store)

app.mount('#app')

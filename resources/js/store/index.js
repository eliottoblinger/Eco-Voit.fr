import Vuex from 'vuex'
import { trips } from './modules/trips'

export default new Vuex.Store({
    modules: {
        TripsStore: trips
    }
})

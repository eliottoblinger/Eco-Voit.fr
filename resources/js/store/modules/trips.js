export const trips = {
    namespaced: true,
    state: () => ({
        trips: [],
        filterTrips: [],
        isFiltering: false,
    }),
    mutations: {
        storeTrips(state, trips) {
            state.trips = trips;
            state.filterTrips = trips;
        },
        filterBy(state, filter){
            state.isFiltering = true;
            setTimeout(() => {
                if(filter === 'departure'){
                    state.trips.sort((a, b) => Date.parse(a.departure_date) > Date.parse(b.departure_date) ? 1 : -1)
                    state.filterTrips.sort((a, b) => Date.parse(a.departure_date) > Date.parse(b.departure_date) ? 1 : -1)
                }else if(filter === 'price'){
                    state.trips.sort((a, b) => a.price > b.price ? 1 : -1)
                    state.filterTrips.sort((a, b) => a.price > b.price ? 1 : -1)
                }else if(filter === 'faster'){
                    state.filterTrips.sort((a, b) => {
                        return a.duration > b.duration ? 1 : -1
                    });
                }else{
                    state.filterTrips = state.trips.filter(trip => new Date(trip.departure_date) >= filter)
                }
                state.isFiltering = false;
            }, 250)
        },
    },
    actions: {
        async addTrip(context, payload){
            await axios.post('/trips', {
                departureCity: payload.departureCity,
                departureZipCode: payload.departureZipCode,
                departureAddress: payload.departureAddress,
                arrivalCity: payload.arrivalCity,
                arrivalZipCode: payload.arrivalZipCode,
                arrivalAddress: payload.arrivalAddress,
                departureDate: payload.departureDate,
                nbOfPassengers: payload.nbOfPassengers,
                price: payload.price,
                description: payload.description,
                duration: payload.duration,
                meters: payload.meters
            });
        }
    },
    getters: {
        getTrips(state){
            return state.trips;
        },
        getFilterTrips(state){
            return state.filterTrips;
        },
        isFiltering(state){
            return state.isFiltering;
        },
        getHours: (state) => (date) => {
            const hours = new Date(date);

            return hours.toLocaleTimeString('fr-FR', {hour: '2-digit', minute: '2-digit'});
        },
        getHoursBetween: (state) => (departure_date, arrival_date) =>{
            const departureDate = new Date(departure_date);
            const arrivalDate = new Date(arrival_date);

            const diffMs = arrivalDate - departureDate;

            let diffHrs = Math.floor((diffMs % 86400000) / 3600000);
            const diffMins = Math.round(((diffMs % 86400000) % 3600000) / 60000);

            if(diffHrs === 0){
                diffHrs = 24;
            }

            return `${('0' + diffHrs).slice(-2)}:${('0' + diffMins).slice(-2)}`;
        },
        getCarbonFootPrint: (state) => (meters) => {
            return (0.19 * (meters / 1000)).toFixed(2)
        },
        scToHours: () => (seconds) => {
            const h = Math.floor(seconds / (60 * 60));

            const divisor_for_minutes = seconds % (60 * 60);
            const m = Math.floor(divisor_for_minutes / 60);

            return `${h?`${h}:`:"00:"}${m.toString().length > 1 ? m : '0' + m}`
        },
    }
}

function getMsBetween(departure_date, arrival_date){
    const departureDate = new Date(departure_date);
    const arrivalDate = new Date(arrival_date);

    return arrivalDate - departureDate;
}

export const trips = {
    namespaced: true,
    state: () => ({
        trips: [],
        filterTrips: []
    }),
    mutations: {
        storeTrips(state, trips) {
            state.trips = trips;
            state.filterTrips = trips;
        },
        filterBy(state, filter){
            if(filter === 'departure'){
                state.trips.sort((a, b) => a.departure_date > b.departure_date ? 1 : -1)
                state.filterTrips.sort((a, b) => a.departure_date > b.departure_date ? 1 : -1)
            }else if(filter === 'price'){
                state.trips.sort((a, b) => a.price > b.price ? 1 : -1)
                state.filterTrips.sort((a, b) => a.price > b.price ? 1 : -1)
            }else if(filter === 'faster'){
                state.trips.sort((a, b) => {
                    const timeTripA = getMsBetween(a.departure_date, a.arrival_date);
                    const timeTripB = getMsBetween(b.departure_date, b.arrival_date);

                    return timeTripA > timeTripB ? 1 : -1
                });
                state.filterTrips.sort((a, b) => {
                    const timeTripA = getMsBetween(a.departure_date, a.arrival_date);
                    const timeTripB = getMsBetween(b.departure_date, b.arrival_date);

                    return timeTripA > timeTripB ? 1 : -1
                });
            }else{
                state.filterTrips = state.trips.filter(trip => new Date(trip.departure_date) >= filter)
            }
        }
    },
    actions: {

    },
    getters: {
        getTrips(state){
            return state.trips;
        },
        getFilterTrips(state){
            return state.filterTrips;
        }
    }
}

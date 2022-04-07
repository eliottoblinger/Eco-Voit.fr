function getMsBetween(departure_date, arrival_date){
    const departureDate = new Date(departure_date);
    const arrivalDate = new Date(arrival_date);

    return arrivalDate - departureDate;
}

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
                state.isFiltering = false;
            }, 250)
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
        }
    }
}

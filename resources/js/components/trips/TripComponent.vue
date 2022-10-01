<template>
    <div @click="openTrip" class="text-decoration-none text-black cursor-pointer">
        <div :class="[isFiltering && isFilterable ? 'bg-light' : 'bg-white', 'my-3', 'p-1', 'rounded-3', 'shadow-lg', 'fw-bold']" style="width: 300px">
            <div class="row mt-3 mb-1 px-3">
                <div class="col-2">
                    <Skeletor class="mb-1" v-if="isFiltering && isFilterable" height="90" width="35" />
                    <div class="d-flex flex-column justify-content-between h-100" v-else>
                        <div class="d-flex flex-column">
                            <span>{{ getHours(trip.departure_date) }}</span>
                            <span class="text-muted">{{ scToHours(trip.duration) }}</span>
                        </div>
                        <span>{{ getHours(new Date( Date.parse(trip.departure_date) + trip.duration*1000 )) }}</span>
                    </div>
                </div>
                <div class="col-7">
                    <Skeletor class="mb-1" v-if="isFiltering && isFilterable" height="90" width="50" />
                    <div class="d-flex flex-column align-items-start text-end" v-else>
                        <div>
                            <svg width="13" height="13" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13 1.625C10.6305 1.6278 8.35883 2.57032 6.68333 4.24582C5.00783 5.92132 4.0653 8.19299 4.06251 10.5625C4.05967 12.4989 4.69218 14.3827 5.86301 15.925C5.86301 15.925 6.10676 16.2459 6.14657 16.2923L13 24.375L19.8567 16.2882C19.8924 16.2451 20.137 15.925 20.137 15.925L20.1378 15.9226C21.3081 14.3809 21.9403 12.498 21.9375 10.5625C21.9347 8.19299 20.9922 5.92132 19.3167 4.24582C17.6412 2.57032 15.3695 1.6278 13 1.625V1.625ZM13 13.8125C12.3572 13.8125 11.7289 13.6219 11.1944 13.2648C10.6599 12.9077 10.2434 12.4001 9.9974 11.8062C9.75142 11.2124 9.68706 10.5589 9.81246 9.92846C9.93786 9.29802 10.2474 8.71892 10.7019 8.2644C11.1564 7.80988 11.7355 7.50035 12.366 7.37495C12.9964 7.24955 13.6499 7.31391 14.2437 7.55989C14.8376 7.80588 15.3452 8.22244 15.7023 8.7569C16.0594 9.29136 16.25 9.91971 16.25 10.5625C16.2489 11.4241 15.9062 12.2501 15.2969 12.8594C14.6877 13.4687 13.8616 13.8114 13 13.8125V13.8125Z" fill="#CBCBCB"/>
                            </svg>
                            {{ trip.departure_city }}
                        </div>
                        <div class="vertical-line my-1 ms-2"></div>
                        <div>
                            <svg width="13" height="13" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13 1.625C10.6305 1.6278 8.35883 2.57032 6.68333 4.24582C5.00783 5.92132 4.0653 8.19299 4.06251 10.5625C4.05967 12.4989 4.69218 14.3827 5.86301 15.925C5.86301 15.925 6.10676 16.2459 6.14657 16.2923L13 24.375L19.8567 16.2882C19.8924 16.2451 20.137 15.925 20.137 15.925L20.1378 15.9226C21.3081 14.3809 21.9403 12.498 21.9375 10.5625C21.9347 8.19299 20.9922 5.92132 19.3167 4.24582C17.6412 2.57032 15.3695 1.6278 13 1.625V1.625ZM13 13.8125C12.3572 13.8125 11.7289 13.6219 11.1944 13.2648C10.6599 12.9077 10.2434 12.4001 9.9974 11.8062C9.75142 11.2124 9.68706 10.5589 9.81246 9.92846C9.93786 9.29802 10.2474 8.71892 10.7019 8.2644C11.1564 7.80988 11.7355 7.50035 12.366 7.37495C12.9964 7.24955 13.6499 7.31391 14.2437 7.55989C14.8376 7.80588 15.3452 8.22244 15.7023 8.7569C16.0594 9.29136 16.25 9.91971 16.25 10.5625C16.2489 11.4241 15.9062 12.2501 15.2969 12.8594C14.6877 13.4687 13.8616 13.8114 13 13.8125V13.8125Z" fill="#CBCBCB"/>
                            </svg>
                            {{ trip.arrival_city }}
                        </div>
                    </div>
                </div>
                <div class="col-3 text-end">
                    <Skeletor class="float-end" v-if="isFiltering && isFilterable" height="18" width="55" pill/>
                    <div v-else class="d-flex justify-content-center align-items-center bg-green-app rounded-pill text-white">
                        {{ (trip.price / 100).toFixed(2) }} €
                    </div>
                </div>
            </div>
            <hr class="mx-3"/>
            <div class="row align-items-center px-3 py-1 text-green-app">
                <div class="col-8">
                    <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center" v-if="isFiltering && isFilterable">
                            <Skeletor class="me-3" circle size="36" />
                            <Skeletor class="float-end" height="15" width="50"/>
                        </div>
                        <div class="d-flex align-items-center" v-else>
                            <div v-if="trip.driver[0].avatar_url" class="me-1" :style="`width:50px;
                            height:50px;
                            border-radius:50%;
                            background-image: url(${trip.driver[0].avatar_url});
                            background-position: center;
                            background-size:100% auto;
                            background-repeat: no-repeat;`">

                            </div>
                            <span>{{ trip.driver[0]?.surname }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-4 text-end">
                    <Skeletor class="float-end" v-if="isFiltering && isFilterable" height="15" width="30"/>
                    <div v-else>
                        <span class="fa fa-star"></span>
                        4.5
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters } from "vuex";

export default {
    name: "TripComponent",
    props: {
        trip: Object,
        isFilterable: Boolean
    },
    methods: {
        openTrip(){
            let anchor = document.createElement('a');
            anchor.href = `/trips/${this.trip.unique_key}`;
            anchor.target="_blank";
            anchor.click();
        }
    },
    computed: {
        ...mapGetters('TripsStore', [
            'isFiltering',
            'getHours',
            'getHoursBetween',
            'scToHours'
        ])
    }
}
</script>

<style scoped>

</style>

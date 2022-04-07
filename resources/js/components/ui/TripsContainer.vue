<template>
    <div v-for="trip of chunk(getFilterTrips, 2)" class="d-flex flex-column flex-md-row align-items-center justify-content-center">
        <div class="p-3 m-3">
            <trip-container
                :trip="trip[0]">
            </trip-container>
        </div>
        <div v-if="trip[1]" class="p-3 m-3">
            <trip-container
                :trip="trip[1]">
            </trip-container>
        </div>
    </div>
</template>

<script>

import TripContainer from './TripContainer';
import { mapMutations, mapGetters } from 'vuex'

export default {
    name: "TripsContainer",
    components: {
        TripContainer
    },
    props: {
        trips: Array
    },
    created(){
        this.storeTrips(this.trips);
    },
    methods: {
        chunk(arr, len){
            var chunks = [],
                i = 0,
                n = arr.length;

            while (i < n) {
                chunks.push(arr.slice(i, i += len));
            }

            return chunks;
        },
        ...mapMutations('trips', [
            'storeTrips'
        ]),
    },
    computed: {
        ...mapGetters('trips', [
            'getFilterTrips'
        ])
    }
}
</script>

<style scoped>

</style>

<template>
    <div v-for="trip of chunk(getFilterTrips, 2)" class="d-flex flex-column flex-md-row align-items-center justify-content-center">
        <div class="p-3 m-3">
            <trip-component
                :trip="trip[0]"
                :is-filterable="true"/>
        </div>
        <div v-if="trip[1]" class="p-3 m-3">
            <trip-component
                :trip="trip[1]"
                :is-filterable="true"/>
        </div>
    </div>
</template>

<script>

import TripComponent from './TripComponent';
import { mapMutations, mapGetters } from 'vuex'

export default {
    name: "TripsComponent",
    components: {
        TripComponent
    },
    props: {
        trips: Array
    },
    created(){
        this.storeTrips(this.trips);
    },
    methods: {
        chunk(arr, len){
            let chunks = [],
                i = 0,
                n = arr.length;

            while (i < n) {
                chunks.push(arr.slice(i, i += len));
            }

            return chunks;
        },
        ...mapMutations('TripsStore', [
            'storeTrips'
        ]),
    },
    computed: {
        ...mapGetters('TripsStore', [
            'getFilterTrips'
        ])
    }
}
</script>

<style scoped>

</style>

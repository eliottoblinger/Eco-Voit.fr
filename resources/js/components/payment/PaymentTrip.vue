<template>
    <p>Hello</p>

</template>
<script>
    import {mapGetters} from "vuex";

    export default {
    name: "PaymentTrip",
    props: {
        user: Object,
        trip: Object
    },
    data() {
        return {
            tab: true
        }
    },
    methods: {

    },
    computed: {
        ...mapGetters('TripsStore', [
            'getHours',
            'getHoursBetween',
            'scToHours',
            'getCarbonFootPrint'
        ])
    },
}
</script>

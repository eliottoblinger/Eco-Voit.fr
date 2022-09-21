<template>
    <h2>Hello</h2>

</template>
<script>
export default {
    name: "UpdatePersonalDataComponent",
    props: {
        user: Object
    },
    computed: {
        comment(){
            return this.user.trips.filter(trip =>
                trip.pivot.opinion.trim() !== ""
            ).length;
        }
    },
}
</script>

<template>
    <div class="d-flex flex-column w-75 mx-auto">
        <trip-component v-for="trip of trips" :trip="trip" class="mx-auto"/>
    </div>
</template>

<script>
export default {
    name: "UserTripsComponent",
    props: {
        trips: Array
    }
}
</script>

<style scoped>

</style>

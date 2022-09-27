<template>
    <div class="my-3">
        <div class="d-flex justify-content-center">
            <h2>
                {{ new Date(trip.departure_date)
                    .toLocaleDateString('fr-FR',  { weekday: 'long', month: 'long', day: 'numeric' })
                    .replace(/(^\w|\s\w)/g, m => m.toUpperCase()) }}
            </h2>
        </div>
        <div class="d-flex flex-column justify-content-center w-100 my-3">
            <div class="d-flex w-50 mx-auto bg-white my-3 p-3 rounded-3 shadow-md">
                <div class="me-3">
                    <div class="d-flex flex-column justify-content-between h-100">
                        <div class="d-flex flex-column">
                            <span>{{ getHours(trip.departure_date) }}</span>
                            <span class="text-muted">{{ scToHours(trip.duration) }}</span>
                        </div>
                        <span>{{ getHours(new Date( Date.parse(trip.departure_date) + trip.duration*1000 )) }}</span>
                    </div>
                </div>
                <div class="">
                    <div class="d-flex flex-column align-items-start text-end">
                        <div class="d-flex align-items-center">
                            <svg class="me-1" width="13" height="13" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13 1.625C10.6305 1.6278 8.35883 2.57032 6.68333 4.24582C5.00783 5.92132 4.0653 8.19299 4.06251 10.5625C4.05967 12.4989 4.69218 14.3827 5.86301 15.925C5.86301 15.925 6.10676 16.2459 6.14657 16.2923L13 24.375L19.8567 16.2882C19.8924 16.2451 20.137 15.925 20.137 15.925L20.1378 15.9226C21.3081 14.3809 21.9403 12.498 21.9375 10.5625C21.9347 8.19299 20.9922 5.92132 19.3167 4.24582C17.6412 2.57032 15.3695 1.6278 13 1.625V1.625ZM13 13.8125C12.3572 13.8125 11.7289 13.6219 11.1944 13.2648C10.6599 12.9077 10.2434 12.4001 9.9974 11.8062C9.75142 11.2124 9.68706 10.5589 9.81246 9.92846C9.93786 9.29802 10.2474 8.71892 10.7019 8.2644C11.1564 7.80988 11.7355 7.50035 12.366 7.37495C12.9964 7.24955 13.6499 7.31391 14.2437 7.55989C14.8376 7.80588 15.3452 8.22244 15.7023 8.7569C16.0594 9.29136 16.25 9.91971 16.25 10.5625C16.2489 11.4241 15.9062 12.2501 15.2969 12.8594C14.6877 13.4687 13.8616 13.8114 13 13.8125V13.8125Z" fill="#CBCBCB"/>
                            </svg>
                            <div class="d-flex flex-column">
                                {{ trip.departure_address }}
                                {{ trip.departure_zip_code }}
                                {{ trip.departure_city }}
                            </div>
                        </div>
                        <div class="vertical-line my-1 ms-2"></div>
                        <div class="d-flex align-items-center">
                            <svg class="me-1" width="13" height="13" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13 1.625C10.6305 1.6278 8.35883 2.57032 6.68333 4.24582C5.00783 5.92132 4.0653 8.19299 4.06251 10.5625C4.05967 12.4989 4.69218 14.3827 5.86301 15.925C5.86301 15.925 6.10676 16.2459 6.14657 16.2923L13 24.375L19.8567 16.2882C19.8924 16.2451 20.137 15.925 20.137 15.925L20.1378 15.9226C21.3081 14.3809 21.9403 12.498 21.9375 10.5625C21.9347 8.19299 20.9922 5.92132 19.3167 4.24582C17.6412 2.57032 15.3695 1.6278 13 1.625V1.625ZM13 13.8125C12.3572 13.8125 11.7289 13.6219 11.1944 13.2648C10.6599 12.9077 10.2434 12.4001 9.9974 11.8062C9.75142 11.2124 9.68706 10.5589 9.81246 9.92846C9.93786 9.29802 10.2474 8.71892 10.7019 8.2644C11.1564 7.80988 11.7355 7.50035 12.366 7.37495C12.9964 7.24955 13.6499 7.31391 14.2437 7.55989C14.8376 7.80588 15.3452 8.22244 15.7023 8.7569C16.0594 9.29136 16.25 9.91971 16.25 10.5625C16.2489 11.4241 15.9062 12.2501 15.2969 12.8594C14.6877 13.4687 13.8616 13.8114 13 13.8125V13.8125Z" fill="#CBCBCB"/>
                            </svg>
                            <div class="d-flex flex-column">
                                {{ trip.arrival_address }}
                                {{ trip.arrival_zip_code }}
                                {{ trip.arrival_city }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between bg-white w-50 mx-auto my-3 p-3 rounded-3 shadow-md">
                <div>
                    Prix total pour un passager
                </div>
                <div class="fw-bold">
                    {{ trip.price.toFixed(2) / 100 }} €
                </div>
            </div>
            <div class="d-flex justify-content-between bg-white w-50 mx-auto my-3 p-3 rounded-3 shadow-md text-green-app">
                <div class="d-flex align-items-center">
                    <svg class="me-3" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 512 512"><path fill="currentColor" d="M63.28 202a15.29 15.29 0 0 1-7.7-2a14.84 14.84 0 0 1-5.52-20.46C69.34 147.36 128 72.25 256 72.25c55.47 0 104.12 14.57 144.53 43.29c33.26 23.57 51.9 50.25 60.78 63.1a14.79 14.79 0 0 1-4 20.79a15.52 15.52 0 0 1-21.24-4C420 172.32 371 102 256 102c-112.25 0-163 64.71-179.53 92.46A15 15 0 0 1 63.28 202Z"/><path fill="currentColor" d="M320.49 496a15.31 15.31 0 0 1-3.79-.43c-92.85-23-127.52-115.82-128.93-119.68l-.22-.85c-.76-2.68-19.39-66.33 9.21-103.61c13.11-17 33.05-25.72 59.38-25.72c24.48 0 42.14 7.61 54.28 23.36c10 12.86 14 28.72 17.87 44c8.13 31.82 14 48.53 47.79 50.25c14.84.75 24.59-7.93 30.12-15.32c14.95-20.15 17.55-53 6.28-82C398 228.57 346.61 158 256 158c-38.68 0-74.22 12.43-102.72 35.79c-23.59 19.35-42.28 46.67-51.28 74.75c-16.69 52.28 5.2 134.46 5.41 135.21A14.83 14.83 0 0 1 96.54 422a15.39 15.39 0 0 1-18.74-10.6c-1-3.75-24.38-91.4-5.1-151.82c21-65.47 85.81-131.47 183.33-131.47c45.07 0 87.65 15.32 123.19 44.25c27.52 22.5 50 52.72 61.76 82.93c14.95 38.57 10.94 81.86-10.19 110.14c-14.08 18.86-34.13 28.72-56.34 27.65c-57.86-2.9-68.26-43.29-75.84-72.75c-7.8-30.22-12.79-44.79-42.58-44.79c-16.36 0-27.85 4.5-35 13.82c-9.75 12.75-10.51 32.68-9.43 47.14a152.44 152.44 0 0 0 5.1 29.79c2.38 6 33.37 82 107.59 100.39a14.88 14.88 0 0 1 11 18.11a15.36 15.36 0 0 1-14.8 11.21Z"/><path fill="currentColor" d="M201.31 489.14a15.5 15.5 0 0 1-11.16-4.71c-37.16-39-58.18-82.61-66.09-137.14V347c-4.44-36.1 2.06-87.21 33.91-122.35c23.51-25.93 56.56-39.11 98.06-39.11c49.08 0 87.65 22.82 111.7 65.89c17.45 31.29 20.91 62.47 21 63.75a15.07 15.07 0 0 1-13.65 16.4a15.26 15.26 0 0 1-16.79-13.29A154 154 0 0 0 340.43 265c-18.64-32.89-47-49.61-84.51-49.61c-32.4 0-57.75 9.75-75.19 29c-25.14 27.75-30 70.5-26.55 98.78c6.93 48.22 25.46 86.58 58.18 120.86a14.7 14.7 0 0 1-.76 21.11a15.44 15.44 0 0 1-10.29 4Z"/><path fill="currentColor" d="M372.5 446.18c-32.5 0-60.13-9-82.24-26.89c-44.42-35.79-49.4-94.08-49.62-96.54a15.27 15.27 0 0 1 30.45-2.36c.11.86 4.55 48.54 38.79 76c20.26 16.18 47.34 22.6 80.71 18.85a15.2 15.2 0 0 1 16.91 13.18a14.92 14.92 0 0 1-13.44 16.5a187 187 0 0 1-21.56 1.26Zm25.68-397.39C385.5 40.54 340.54 16 256 16c-88.74 0-133.81 27.11-143.78 34a11.59 11.59 0 0 0-1.84 1.4a.36.36 0 0 1-.22.1a14.87 14.87 0 0 0-5.09 11.15a15.06 15.06 0 0 0 15.31 14.85a15.56 15.56 0 0 0 8.88-2.79c.43-.32 39.22-28.82 126.77-28.82S382.58 74.29 383 74.5a15.25 15.25 0 0 0 9.21 3a15.06 15.06 0 0 0 15.29-14.89a14.9 14.9 0 0 0-9.32-13.82Z"/></svg>
                    Empreinte carbone du trajet
                </div>
                <div class="fw-bold">
                    {{ getCarbonFootPrint(trip.meters) }}
                </div>
            </div>
            <div class="d-flex flex-column bg-white w-50 mx-auto my-3 p-3 rounded-3 shadow-md">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header mx-auto" id="flush-headingOne">
                            <button class="accordion-button collapsed p-0" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne" style="font-size: 16px;">
                                Description
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body px-0 py-3">
                                {{ trip.description }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-column bg-white w-50 my-3 mx-auto rounded-3 shadow-md">
                <div class="d-flex align-items-center justify-content-between p-3">
                    <div class="fw-bold text-green-app">
                        {{ trip.driver[0].surname }}
                    </div>
                    <div v-if="trip.driver[0].avatar_url" :style="`width:50px;
                            height:50px;
                            border-radius:50%;
                            z-index: 99999;
                            background-image: url(${trip.driver[0].avatar_url});
                            background-position: center;
                            background-size:100% auto;
                            background-repeat: no-repeat;`">
                    </div>
                </div>
                <div class="d-flex align-items-center p-3 text-green-app">
                    <svg class="me-3" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="26" height="26" preserveAspectRatio="xMidYMid meet" viewBox="0 0 36 36"><path fill="currentColor" d="M23 26a1 1 0 0 1-1 1H8c-.22 0-.43.2-.61.33L4 30V14a1 1 0 0 1 1-1h3.86v-2H5a3 3 0 0 0-3 3v18a1 1 0 0 0 .56.89a1 1 0 0 0 1-.1L8.71 29h13.44A2.77 2.77 0 0 0 25 26.13V25h-2Z" class="clr-i-outline clr-i-outline-path-1"/><path fill="currentColor" d="M31 4H14a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3h13.55l4.78 3.71a1 1 0 0 0 1 .11a1 1 0 0 0 .57-.9V7A3 3 0 0 0 31 4Zm1 18.94l-3.5-2.73a1 1 0 0 0-.61-.21H14a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h17a1.1 1.1 0 0 1 1 1.06Z" class="clr-i-outline clr-i-outline-path-2"/><path fill="none" d="M0 0h36v36H0z"/></svg>
                    Contacter {{ trip.driver[0].surname }}
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center my-3">
            <button v-if="!reserved" @click="doPayment" class="btn btn-lg rounded-pill bg-green-app text-white">
                Réserver
            </button>
        </div>
    </div>
</template>

<script>
import {mapGetters} from "vuex";

export default {
    name: "TripCheckoutComponent",
    props: {
        trip: Object,
        reserved: Boolean
    },
    computed: {
        ...mapGetters('TripsStore', [
            'getHours',
            'getHoursBetween',
            'scToHours',
            'getCarbonFootPrint'
        ])
    },
    methods: {
        doPayment() {
            location.href = `/payment-trip/${this.trip.unique_key}`;
        }
    }
}
</script>

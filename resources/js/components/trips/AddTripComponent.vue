<template>
    <div class="bg-gray-light-app mt-5 d-flex justify-content-center flex-column position-relative" style="min-height: 75vh;">
        <div class="d-flex justify-content-center position-absolute top-0 start-50 mt-5 translate-middle-x">
            <div :class="[step === 1 ? 'bg-green-app' : 'bg-white border-green-app', 'dot mx-3']">

            </div>
            <div :class="[step === 2 ? 'bg-green-app' : 'bg-white border-green-app', 'dot mx-3']">

            </div>
            <div :class="[step === 3 ? 'bg-green-app' : 'bg-white border-green-app', 'dot mx-3']">

            </div>
            <div :class="[step === 4 ? 'bg-green-app' : 'bg-white border-green-app', 'dot mx-3']">

            </div>
            <div :class="[step === 5 ? 'bg-green-app' : 'bg-white border-green-app', 'dot mx-3']">

            </div>
        </div>
        <div class="w-75 mx-auto">
            <div v-if="step === 1">
                <h3 class="fs-2 fw-bold my-3">Quelle est l'adresse de départ ?</h3>
                <div class="d-flex bg-white shadow-lg rounded-pill my-5 py-3 position-relative">
                    <svg class="mx-3" width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13 1.625C10.6305 1.6278 8.35883 2.57032 6.68333 4.24582C5.00783 5.92132 4.0653 8.19299 4.06251 10.5625C4.05967 12.4989 4.69218 14.3827 5.86301 15.925C5.86301 15.925 6.10676 16.2459 6.14657 16.2923L13 24.375L19.8567 16.2882C19.8924 16.2451 20.137 15.925 20.137 15.925L20.1378 15.9226C21.3081 14.3809 21.9403 12.498 21.9375 10.5625C21.9347 8.19299 20.9922 5.92132 19.3167 4.24582C17.6412 2.57032 15.3695 1.6278 13 1.625V1.625ZM13 13.8125C12.3572 13.8125 11.7289 13.6219 11.1944 13.2648C10.6599 12.9077 10.2434 12.4001 9.9974 11.8062C9.75142 11.2124 9.68706 10.5589 9.81246 9.92846C9.93786 9.29802 10.2474 8.71892 10.7019 8.2644C11.1564 7.80988 11.7355 7.50035 12.366 7.37495C12.9964 7.24955 13.6499 7.31391 14.2437 7.55989C14.8376 7.80588 15.3452 8.22244 15.7023 8.7569C16.0594 9.29136 16.25 9.91971 16.25 10.5625C16.2489 11.4241 15.9062 12.2501 15.2969 12.8594C14.6877 13.4687 13.8616 13.8114 13 13.8125V13.8125Z" fill="#CBCBCB"/>
                    </svg>
                    <input type="text" class="w-100" placeholder="Marseille, Paris, Strasbourg..." v-model="departure" @input="searchDepartures">
                    <div v-if="departures.length" class="position-absolute bg-white top-100 mt-4 d-flex flex-column w-50" style="max-height: 250px; width: 95%; overflow: auto;">
                        <span v-for="depart of departures" class="fs-5 fw-bold cursor-pointer p-3 result"
                              @click="selectDeparture(depart.properties)">
                            {{ depart.properties.label }}
                        </span>
                    </div>
                </div>
            </div>

            <div v-if="step === 2">
                <h3 class="fs-2 fw-bold my-3">Quelle est l'adresse d'arrivée ?</h3>
                <div class="d-flex bg-white shadow-lg rounded-pill my-5 py-3 position-relative">
                    <svg class="mx-3" width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13 1.625C10.6305 1.6278 8.35883 2.57032 6.68333 4.24582C5.00783 5.92132 4.0653 8.19299 4.06251 10.5625C4.05967 12.4989 4.69218 14.3827 5.86301 15.925C5.86301 15.925 6.10676 16.2459 6.14657 16.2923L13 24.375L19.8567 16.2882C19.8924 16.2451 20.137 15.925 20.137 15.925L20.1378 15.9226C21.3081 14.3809 21.9403 12.498 21.9375 10.5625C21.9347 8.19299 20.9922 5.92132 19.3167 4.24582C17.6412 2.57032 15.3695 1.6278 13 1.625V1.625ZM13 13.8125C12.3572 13.8125 11.7289 13.6219 11.1944 13.2648C10.6599 12.9077 10.2434 12.4001 9.9974 11.8062C9.75142 11.2124 9.68706 10.5589 9.81246 9.92846C9.93786 9.29802 10.2474 8.71892 10.7019 8.2644C11.1564 7.80988 11.7355 7.50035 12.366 7.37495C12.9964 7.24955 13.6499 7.31391 14.2437 7.55989C14.8376 7.80588 15.3452 8.22244 15.7023 8.7569C16.0594 9.29136 16.25 9.91971 16.25 10.5625C16.2489 11.4241 15.9062 12.2501 15.2969 12.8594C14.6877 13.4687 13.8616 13.8114 13 13.8125V13.8125Z" fill="#CBCBCB"/>
                    </svg>
                    <input type="text" class="w-100" placeholder="Marseille, Paris, Strasbourg..." v-model="arrival" @input="searchArrivals">
                    <div v-if="arrivals.length" class="position-absolute bg-white top-100 mt-4 d-flex flex-column w-50" style="max-height: 250px; width: 95%; overflow: auto;">
                        <span v-for="arriv of arrivals" class="fs-5 fw-bold cursor-pointer p-3 result"
                              @click="selectArrival(arriv.properties)">
                            {{ arriv.properties.label }}
                        </span>
                    </div>
                </div>
            </div>

            <div v-if="step === 3">
                <h3 class="fs-2 fw-bold my-3">Veuillez indiquer la date ainsi que l'heure du départ</h3>
                <div class="d-flex bg-white shadow-lg rounded-pill my-5 py-3">
                    <svg class="mx-3" width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.75 10.8333V13H7.58333V10.8333H9.75ZM14.0833 10.8333V13H11.9167V10.8333H14.0833ZM18.4167 10.8333V13H16.25V10.8333H18.4167ZM20.5833 3.24999C21.158 3.24999 21.7091 3.47827 22.1154 3.8846C22.5217 4.29093 22.75 4.84203 22.75 5.41666V20.5833C22.75 21.158 22.5217 21.7091 22.1154 22.1154C21.7091 22.5217 21.158 22.75 20.5833 22.75H5.41667C4.84203 22.75 4.29093 22.5217 3.8846 22.1154C3.47827 21.7091 3.25 21.158 3.25 20.5833V5.41666C3.25 4.84203 3.47827 4.29093 3.8846 3.8846C4.29093 3.47827 4.84203 3.24999 5.41667 3.24999H6.5V1.08333H8.66667V3.24999H17.3333V1.08333H19.5V3.24999H20.5833ZM20.5833 20.5833V8.66666H5.41667V20.5833H20.5833ZM9.75 15.1667V17.3333H7.58333V15.1667H9.75ZM14.0833 15.1667V17.3333H11.9167V15.1667H14.0833ZM18.4167 15.1667V17.3333H16.25V15.1667H18.4167Z" fill="#CBCBCB"/>
                    </svg>
                    <v-date-picker
                        v-model="departureDate"
                        mode="datetime"
                        :popover="{ placement: $screens({ default: 'right' }) }"
                        :min-date="new Date()"
                        is24hr>
                        <template v-slot="{ inputValue, inputEvents }">
                            <input
                                class="px-2 py-1 text-green-app"
                                :value="inputValue"
                                v-on="inputEvents"
                            />
                        </template>
                    </v-date-picker>
                </div>
            </div>


            <div v-if="step === 4">
                <h3 class="fs-2 fw-bold my-3">Combien de place(s) souhaitez-vous mettre à disposition ?</h3>
                <div class="d-flex justify-content-between bg-white shadow-lg rounded-pill my-5 py-3">
                    <div class="d-flex">
                        <svg class="mx-3" width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_27_134)">
                                <path d="M11.5 7.55745e-06C10.7848 -0.0170939 10.0735 0.108994 9.40778 0.370854C8.74208 0.632713 8.13546 1.02506 7.62362 1.52481C7.11178 2.02456 6.70505 2.62162 6.42735 3.28087C6.14965 3.94012 6.00659 4.64825 6.00659 5.36361C6.00659 6.07896 6.14965 6.78709 6.42735 7.44635C6.70505 8.1056 7.11178 8.70266 7.62362 9.20241C8.13546 9.70216 8.74208 10.0945 9.40778 10.3564C10.0735 10.6182 10.7848 10.7443 11.5 10.7272C12.2151 10.7443 12.9265 10.6182 13.5922 10.3564C14.2579 10.0945 14.8645 9.70216 15.3763 9.20241C15.8882 8.70266 16.2949 8.1056 16.5726 7.44635C16.8503 6.78709 16.9934 6.07896 16.9934 5.36361C16.9934 4.64825 16.8503 3.94012 16.5726 3.28087C16.2949 2.62162 15.8882 2.02456 15.3763 1.52481C14.8645 1.02506 14.2579 0.632713 13.5922 0.370854C12.9265 0.108994 12.2151 -0.0170939 11.5 7.55745e-06ZM8.43332 13.7908C7.00999 13.7908 5.64496 14.3562 4.63851 15.3627C3.63207 16.3691 3.06665 17.7341 3.06665 19.1575V22.9862H19.9333V19.1575C19.9333 17.7341 19.3679 16.3691 18.3615 15.3627C17.355 14.3562 15.99 13.7908 14.5666 13.7908H8.43332Z" fill="#CBCBCB"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_27_134">
                                    <rect width="23" height="23" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                        <input type="number" min="1" max="7" v-model="nbOfPassengers">
                    </div>
                    <div class="d-flex align-items-center me-3">
                        <i class="fa fa-minus me-3 cursor-pointer" @click="nbOfPassengers > 1 ? nbOfPassengers-- : nbOfPassengers"></i>
                        <i class="fa fa-plus cursor-pointer" @click="nbOfPassengers > 7 ? nbOfPassengers : nbOfPassengers++"></i>
                    </div>
                </div>
            </div>

            <div v-if="step === 5">
                <h3 class="fs-2 fw-bold my-5">Informations sur le trajet</h3>
                <div class="my-3">
                    <label for="exampleFormControlTextarea1" class="form-label fs-sm fw-bold">Description du trajet</label>
                    <textarea class="form-control fs-sm fw-bold shadow-lg rounded" id="exampleFormControlTextarea1" rows="4" v-model="description"></textarea>
                </div>
                <div class="my-5">
                    <label class="form-label fs-sm fw-bold">Prix du trajet</label>
                    <div class="d-flex justify-content-between bg-white shadow-lg rounded-pill py-3">
                        <div class="d-flex">
                            <svg class="mx-3" width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13 0C5.82098 0 0 5.82098 0 13C0 20.179 5.82098 26 13 26C20.179 26 26 20.179 26 13C26 5.82098 20.179 0 13 0ZM13 23.7946C7.03973 23.7946 2.20536 18.9603 2.20536 13C2.20536 7.03973 7.03973 2.20536 13 2.20536C18.9603 2.20536 23.7946 7.03973 23.7946 13C23.7946 18.9603 18.9603 23.7946 13 23.7946ZM16.4154 6.71473C15.954 6.61317 15.4172 6.55804 14.8107 6.55804C11.7145 6.55804 9.61942 8.17433 9.04777 10.9078H8.125C7.99732 10.9078 7.89286 11.0123 7.89286 11.14V11.9292C7.89286 12.0569 7.99732 12.1614 8.125 12.1614H8.89107C8.88237 12.2804 8.88237 12.4051 8.88237 12.5328V13.6036H8.125C7.99732 13.6036 7.89286 13.708 7.89286 13.8357V14.625C7.89286 14.7527 7.99732 14.8571 8.125 14.8571H9.00134C9.50045 17.7357 11.6246 19.442 14.8107 19.442C15.4172 19.442 15.954 19.3926 16.4154 19.294C16.5228 19.2708 16.6011 19.1779 16.6011 19.0676V17.8257C16.6011 17.6806 16.4676 17.5703 16.3254 17.5993C15.8989 17.6806 15.3998 17.7183 14.8223 17.7183C12.8346 17.7183 11.4998 16.6562 11.0558 14.8571H14.8455C14.9732 14.8571 15.0777 14.7527 15.0777 14.625V13.8357C15.0777 13.708 14.9732 13.6036 14.8455 13.6036H10.8875V12.5589C10.8875 12.4225 10.8875 12.2862 10.8962 12.1585H14.8397C14.9674 12.1585 15.0719 12.054 15.0719 11.9263V11.1371C15.0719 11.0094 14.9674 10.9049 14.8397 10.9049H11.1167C11.6158 9.25379 12.9246 8.2817 14.8194 8.2817C15.3969 8.2817 15.896 8.32522 16.3196 8.40937C16.3533 8.41624 16.388 8.41556 16.4214 8.40739C16.4547 8.39921 16.4858 8.38374 16.5125 8.36209C16.5391 8.34044 16.5606 8.31316 16.5754 8.28219C16.5903 8.25123 16.598 8.21737 16.5982 8.18304V6.94107C16.5982 6.8308 16.5228 6.73795 16.4154 6.71473V6.71473Z" fill="#CBCBCB"/>
                            </svg>

                            <input type="number" min="1" v-model="price" step="0.1">
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end my-3">
                <button v-if="step > 1" class="btn btn-lg btn-outline-secondary text-center fw-bold rounded shadow-lg mt-3 me-3" style="width: 125px;" @click="step--">
                    Précedent
                </button>
                <button v-if="step < 5"
                        :class="[nextBtnDisabled ? 'disabled' : '', 'btn btn-lg bg-green-app text-white text-center fw-bold rounded shadow-lg mt-3']" style="width: 125px;" @click="step++">
                    Suivant
                </button>
                <button v-if="step === 5" class="btn btn-lg bg-green-app text-white text-center fw-bold rounded shadow-lg mt-3"
                        style="width: 125px;" @click="validForm">
                    Valider
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import {mapActions} from "vuex";

export default {
    name: "AddTripComponent",
    data(){
        return {
            departure: '',
            arrival: '',
            departures: [],
            arrivals: [],
            departureCity: '',
            departureZipCode: '',
            departureAddress: '',
            arrivalCity: '',
            arrivalZipCode: '',
            arrivalAddress: '',
            departureDate: new Date(),
            step: 1,
            description: '',
            nbOfPassengers: 1,
            meters: 0,
            searching: false,
            duration: 0,
            price: 7.50
        }
    },
    computed: {
        nextBtnDisabled(){
            return (this.step === 1 && this.departureCity.trim() === '') || (this.step === 2 && this.arrivalCity.trim() === '');
        }
    },
    methods: {
        ...mapActions('TripsStore', [
            'addTrip'
        ]),
        async validForm(){
            await this.addTrip({
                departureCity: this.departureCity,
                departureZipCode: this.departureZipCode,
                departureAddress: this.departureAddress,
                arrivalCity: this.arrivalCity,
                arrivalZipCode: this.arrivalZipCode,
                arrivalAddress: this.arrivalAddress,
                departureDate: this.departureDate,
                nbOfPassengers: this.nbOfPassengers,
                price: this.price * 100,
                description: this.description,
                meters: this.meters,
                duration: this.duration
            });

            location.href = '/account'
        },
        selectDeparture(departure){
            const depart = Object.assign({}, departure)

            this.departureCity = depart.city;
            this.departureZipCode = depart.postcode;
            this.departureAddress = depart.street;

            this.departure = depart.label;

            this.departures = [];
        },
        async searchDepartures(){
            if(!this.searching && this.departure.length > 3){
                this.departureCity = '';
                this.departureZipCode = '';
                this.departureAddress = '';

                this.searching = true;

                const { data } = await axios.get('https://api-adresse.data.gouv.fr/search/', {
                    params: {
                        q: this.departure,
                        limit: 25
                    }
                });

                this.searching = false;

                this.departures = data.features;
            }
        },
        async selectArrival(arriv){
            const arrival = Object.assign({}, arriv)

            this.arrivalCity = arrival.city;
            this.arrivalZipCode = arrival.postcode;
            this.arrivalAddress = arrival.street;

            this.arrival = arrival.label;

            this.arrivals = [];

            const { data } = await axios.get('https://api.distancematrix.ai/maps/api/distancematrix/json', {
                params: {
                    key: 'eCMYOTcfT9GC78IiJfAPZRPGWaR4J',
                    origins: `${this.departure}`,
                    destinations: `${this.arrival}`,
                }
            });

            this.meters = data.rows[0].elements[0].distance.value;
            this.duration = data.rows[0].elements[0].duration.value;
        },
        async searchArrivals(){
            if(!this.searching && this.arrival.length > 3) {
                this.arrivalCity = '';
                this.arrivalZipCode = '';
                this.arrivalAddress = '';
                this.meters = 0;
                this.duration = 0;

                this.searching = true;

                const {data} = await axios.get('https://api-adresse.data.gouv.fr/search/', {
                    params: {
                        q: this.arrival,
                        limit: 25
                    }
                });

                this.searching = false;

                this.arrivals = data.features;
            }
        }
    }
}
</script>

<style scoped>

</style>

<template>
    <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between w-75 mx-auto" style="font-size: 14px;">
        Tri par :
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="departure" v-model="radioBtnFilter">
            <label class="form-check-label" for="inlineRadio1">Départ le plus tôt</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="price" v-model="radioBtnFilter">
            <label class="form-check-label" for="inlineRadio2">Prix le plus bas</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="faster" v-model="radioBtnFilter">
            <label class="form-check-label" for="inlineRadio3">Trajet le plus court</label>
        </div>
    </div>
    <hr class="mx-3 w-75 mx-auto"/>
    <div class="d-flex flex-row align-items-center justify-content-between w-75 mx-auto" style="font-size: 14px;">
        <div class="d-flex align-items-center">
            <svg class="me-1" width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.75 10.8333V13H7.58333V10.8333H9.75ZM14.0833 10.8333V13H11.9167V10.8333H14.0833ZM18.4167 10.8333V13H16.25V10.8333H18.4167ZM20.5833 3.24999C21.158 3.24999 21.7091 3.47827 22.1154 3.8846C22.5217 4.29093 22.75 4.84203 22.75 5.41666V20.5833C22.75 21.158 22.5217 21.7091 22.1154 22.1154C21.7091 22.5217 21.158 22.75 20.5833 22.75H5.41667C4.84203 22.75 4.29093 22.5217 3.8846 22.1154C3.47827 21.7091 3.25 21.158 3.25 20.5833V5.41666C3.25 4.84203 3.47827 4.29093 3.8846 3.8846C4.29093 3.47827 4.84203 3.24999 5.41667 3.24999H6.5V1.08333H8.66667V3.24999H17.3333V1.08333H19.5V3.24999H20.5833ZM20.5833 20.5833V8.66666H5.41667V20.5833H20.5833ZM9.75 15.1667V17.3333H7.58333V15.1667H9.75ZM14.0833 15.1667V17.3333H11.9167V15.1667H14.0833ZM18.4167 15.1667V17.3333H16.25V15.1667H18.4167Z" fill="#CBCBCB"/>
            </svg>
            À partir de :
            <v-date-picker mode="time" v-model="localDepartureDate" timezone="Europe/Amsterdam" :masks='{ input:["HH"] }' is24hr>
                <template v-slot="{ inputValue, inputEvents }">
                    <input
                        class="text-green-app"
                        :value="inputValue"
                        v-on="inputEvents"
                    />
                </template>
            </v-date-picker>
        </div>
        <div class="">
            Trajets : <span class="text-green-app">{{ getFilterTrips.length }}</span>
        </div>
    </div>
</template>

<script>
import {mapGetters, mapMutations} from "vuex";

export default {
    name: "FiltersComponent",
    data(){
        return {
            radioBtnFilter: 'departure',
            localDepartureDate: new Date(this.departureDate)
        }
    },
    watch: {
        radioBtnFilter(value) {
            this.filterBy(value)
        },
        localDepartureDate(value){
            this.filterBy(value)
        }
    },
    props: {
        departureDate: String
    },
    methods: {
        ...mapMutations('TripsStore', [
            'filterBy'
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

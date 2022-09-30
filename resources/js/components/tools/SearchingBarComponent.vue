<template>
    <div class="d-none d-lg-flex bg-white shadow-lg rounded-pill mb-3 w-75">
        <div style="width: 25%;" class="my-3 px-3 d-flex align-items-center justify-content-start border-end position-relative">
            <svg class="me-1" width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13 1.625C10.6305 1.6278 8.35883 2.57032 6.68333 4.24582C5.00783 5.92132 4.0653 8.19299 4.06251 10.5625C4.05967 12.4989 4.69218 14.3827 5.86301 15.925C5.86301 15.925 6.10676 16.2459 6.14657 16.2923L13 24.375L19.8567 16.2882C19.8924 16.2451 20.137 15.925 20.137 15.925L20.1378 15.9226C21.3081 14.3809 21.9403 12.498 21.9375 10.5625C21.9347 8.19299 20.9922 5.92132 19.3167 4.24582C17.6412 2.57032 15.3695 1.6278 13 1.625V1.625ZM13 13.8125C12.3572 13.8125 11.7289 13.6219 11.1944 13.2648C10.6599 12.9077 10.2434 12.4001 9.9974 11.8062C9.75142 11.2124 9.68706 10.5589 9.81246 9.92846C9.93786 9.29802 10.2474 8.71892 10.7019 8.2644C11.1564 7.80988 11.7355 7.50035 12.366 7.37495C12.9964 7.24955 13.6499 7.31391 14.2437 7.55989C14.8376 7.80588 15.3452 8.22244 15.7023 8.7569C16.0594 9.29136 16.25 9.91971 16.25 10.5625C16.2489 11.4241 15.9062 12.2501 15.2969 12.8594C14.6877 13.4687 13.8616 13.8114 13 13.8125V13.8125Z" fill="#CBCBCB"/>
            </svg>
            <input type="text" placeholder="Départ" class="w-100" v-model="departureCity" @input="searchCity('departure')">
            <div v-if="departureCities.length" class="position-absolute bg-white top-100 mt-4 d-flex flex-column" style="max-height: 250px; width: 95%; overflow: auto;">
                <span v-for="city of departureCities" class="fs-5 fw-bold cursor-pointer p-3 result"
                      @click="selectCity('departure', city.properties.label)">
                    {{ city.properties.label }}
                </span>
            </div>
        </div>
        <div style="width: 25%;" class="my-3 px-3 d-flex align-items-center justify-content-start border-end position-relative">
            <svg class="me-1" width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13 1.625C10.6305 1.6278 8.35883 2.57032 6.68333 4.24582C5.00783 5.92132 4.0653 8.19299 4.06251 10.5625C4.05967 12.4989 4.69218 14.3827 5.86301 15.925C5.86301 15.925 6.10676 16.2459 6.14657 16.2923L13 24.375L19.8567 16.2882C19.8924 16.2451 20.137 15.925 20.137 15.925L20.1378 15.9226C21.3081 14.3809 21.9403 12.498 21.9375 10.5625C21.9347 8.19299 20.9922 5.92132 19.3167 4.24582C17.6412 2.57032 15.3695 1.6278 13 1.625V1.625ZM13 13.8125C12.3572 13.8125 11.7289 13.6219 11.1944 13.2648C10.6599 12.9077 10.2434 12.4001 9.9974 11.8062C9.75142 11.2124 9.68706 10.5589 9.81246 9.92846C9.93786 9.29802 10.2474 8.71892 10.7019 8.2644C11.1564 7.80988 11.7355 7.50035 12.366 7.37495C12.9964 7.24955 13.6499 7.31391 14.2437 7.55989C14.8376 7.80588 15.3452 8.22244 15.7023 8.7569C16.0594 9.29136 16.25 9.91971 16.25 10.5625C16.2489 11.4241 15.9062 12.2501 15.2969 12.8594C14.6877 13.4687 13.8616 13.8114 13 13.8125V13.8125Z" fill="#CBCBCB"/>
            </svg>
            <input type="text" placeholder="Arrivée" class="w-100" v-model="arrivalCity" @input="searchCity('arrival')">
            <div v-if="arrivalCities.length" class="position-absolute bg-white top-100 mt-4 d-flex flex-column" style="max-height: 250px; width: 95%; overflow: auto;">
                <span v-for="city of arrivalCities" class="fs-5 fw-bold cursor-pointer p-3 result"
                      @click="selectCity('arrival', city.properties.label)">
                    {{ city.properties.label }}
                </span>
            </div>
        </div>
        <div style="width: 25%;" class="my-3 px-3 d-flex align-items-center justify-content-start border-end">
            <svg class="me-1" width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.75 10.8333V13H7.58333V10.8333H9.75ZM14.0833 10.8333V13H11.9167V10.8333H14.0833ZM18.4167 10.8333V13H16.25V10.8333H18.4167ZM20.5833 3.24999C21.158 3.24999 21.7091 3.47827 22.1154 3.8846C22.5217 4.29093 22.75 4.84203 22.75 5.41666V20.5833C22.75 21.158 22.5217 21.7091 22.1154 22.1154C21.7091 22.5217 21.158 22.75 20.5833 22.75H5.41667C4.84203 22.75 4.29093 22.5217 3.8846 22.1154C3.47827 21.7091 3.25 21.158 3.25 20.5833V5.41666C3.25 4.84203 3.47827 4.29093 3.8846 3.8846C4.29093 3.47827 4.84203 3.24999 5.41667 3.24999H6.5V1.08333H8.66667V3.24999H17.3333V1.08333H19.5V3.24999H20.5833ZM20.5833 20.5833V8.66666H5.41667V20.5833H20.5833ZM9.75 15.1667V17.3333H7.58333V15.1667H9.75ZM14.0833 15.1667V17.3333H11.9167V15.1667H14.0833ZM18.4167 15.1667V17.3333H16.25V15.1667H18.4167Z" fill="#CBCBCB"/>
            </svg>
            <v-date-picker
                v-model="departureDate"
                mode="date"
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
        <div style="width: 15%;" class="px-3 d-flex align-items-center justify-content-between border-end position-relative">
            <div class="d-flex">
                <svg class="me-1" width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_27_134)">
                        <path d="M11.5 7.55745e-06C10.7848 -0.0170939 10.0735 0.108994 9.40778 0.370854C8.74208 0.632713 8.13546 1.02506 7.62362 1.52481C7.11178 2.02456 6.70505 2.62162 6.42735 3.28087C6.14965 3.94012 6.00659 4.64825 6.00659 5.36361C6.00659 6.07896 6.14965 6.78709 6.42735 7.44635C6.70505 8.1056 7.11178 8.70266 7.62362 9.20241C8.13546 9.70216 8.74208 10.0945 9.40778 10.3564C10.0735 10.6182 10.7848 10.7443 11.5 10.7272C12.2151 10.7443 12.9265 10.6182 13.5922 10.3564C14.2579 10.0945 14.8645 9.70216 15.3763 9.20241C15.8882 8.70266 16.2949 8.1056 16.5726 7.44635C16.8503 6.78709 16.9934 6.07896 16.9934 5.36361C16.9934 4.64825 16.8503 3.94012 16.5726 3.28087C16.2949 2.62162 15.8882 2.02456 15.3763 1.52481C14.8645 1.02506 14.2579 0.632713 13.5922 0.370854C12.9265 0.108994 12.2151 -0.0170939 11.5 7.55745e-06ZM8.43332 13.7908C7.00999 13.7908 5.64496 14.3562 4.63851 15.3627C3.63207 16.3691 3.06665 17.7341 3.06665 19.1575V22.9862H19.9333V19.1575C19.9333 17.7341 19.3679 16.3691 18.3615 15.3627C17.355 14.3562 15.99 13.7908 14.5666 13.7908H8.43332Z" fill="#CBCBCB"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_27_134">
                            <rect width="23" height="23" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>
                <input type="number" min="1" v-model="nbOfPassengers">
            </div>
            <div class="d-flex align-items-center position-absolute end-0 me-3">
                <i class="fa fa-minus me-3 cursor-pointer" @click="nbOfPassengers > 1 ? nbOfPassengers-- : nbOfPassengers"></i>
                <i class="fa fa-plus cursor-pointer" @click="nbOfPassengers++"></i>
            </div>
        </div>
        <div style="width: 15%; border-bottom-left-radius: unset !important; border-top-left-radius: unset !important;" class="cursor-pointer px-5 fw-bold bg-green-app text-white rounded-pill d-flex align-items-center justify-content-center"
            @click="searchTrip">
            Rechercher
        </div>
    </div>
    <div class="d-flex flex-column bg-white shadow-lg text-center rounded-3 mb-3 d-lg-none">
        <div class="d-flex p-3 position-relative">
            <svg class="me-1" width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13 1.625C10.6305 1.6278 8.35883 2.57032 6.68333 4.24582C5.00783 5.92132 4.0653 8.19299 4.06251 10.5625C4.05967 12.4989 4.69218 14.3827 5.86301 15.925C5.86301 15.925 6.10676 16.2459 6.14657 16.2923L13 24.375L19.8567 16.2882C19.8924 16.2451 20.137 15.925 20.137 15.925L20.1378 15.9226C21.3081 14.3809 21.9403 12.498 21.9375 10.5625C21.9347 8.19299 20.9922 5.92132 19.3167 4.24582C17.6412 2.57032 15.3695 1.6278 13 1.625V1.625ZM13 13.8125C12.3572 13.8125 11.7289 13.6219 11.1944 13.2648C10.6599 12.9077 10.2434 12.4001 9.9974 11.8062C9.75142 11.2124 9.68706 10.5589 9.81246 9.92846C9.93786 9.29802 10.2474 8.71892 10.7019 8.2644C11.1564 7.80988 11.7355 7.50035 12.366 7.37495C12.9964 7.24955 13.6499 7.31391 14.2437 7.55989C14.8376 7.80588 15.3452 8.22244 15.7023 8.7569C16.0594 9.29136 16.25 9.91971 16.25 10.5625C16.2489 11.4241 15.9062 12.2501 15.2969 12.8594C14.6877 13.4687 13.8616 13.8114 13 13.8125V13.8125Z" fill="#CBCBCB"/>
            </svg>
            <input type="text" placeholder="Départ" v-model="departureCity" @input="searchCity('departure')">
            <div v-if="departureCities.length" class="position-absolute bg-white top-100 mt-4 d-flex flex-column" style="max-height: 250px; width: 95%; overflow: auto; z-index: 99999;">
                <span v-for="city of departureCities" class="fs-5 fw-bold cursor-pointer p-3 result"
                      @click="selectCity('departure', city.properties.label)">
                    {{ city.properties.label }}
                </span>
            </div>
        </div>
        <div class="d-flex p-3 position-relative">
            <svg class="me-1" width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13 1.625C10.6305 1.6278 8.35883 2.57032 6.68333 4.24582C5.00783 5.92132 4.0653 8.19299 4.06251 10.5625C4.05967 12.4989 4.69218 14.3827 5.86301 15.925C5.86301 15.925 6.10676 16.2459 6.14657 16.2923L13 24.375L19.8567 16.2882C19.8924 16.2451 20.137 15.925 20.137 15.925L20.1378 15.9226C21.3081 14.3809 21.9403 12.498 21.9375 10.5625C21.9347 8.19299 20.9922 5.92132 19.3167 4.24582C17.6412 2.57032 15.3695 1.6278 13 1.625V1.625ZM13 13.8125C12.3572 13.8125 11.7289 13.6219 11.1944 13.2648C10.6599 12.9077 10.2434 12.4001 9.9974 11.8062C9.75142 11.2124 9.68706 10.5589 9.81246 9.92846C9.93786 9.29802 10.2474 8.71892 10.7019 8.2644C11.1564 7.80988 11.7355 7.50035 12.366 7.37495C12.9964 7.24955 13.6499 7.31391 14.2437 7.55989C14.8376 7.80588 15.3452 8.22244 15.7023 8.7569C16.0594 9.29136 16.25 9.91971 16.25 10.5625C16.2489 11.4241 15.9062 12.2501 15.2969 12.8594C14.6877 13.4687 13.8616 13.8114 13 13.8125V13.8125Z" fill="#CBCBCB"/>
            </svg>
            <input type="text" placeholder="Destination" v-model="arrivalCity" @input="searchCity('arrival')">
            <div v-if="arrivalCities.length" class="position-absolute bg-white top-100 mt-4 d-flex flex-column" style="max-height: 250px; width: 95%; overflow: auto; z-index: 99999;">
                <span v-for="city of arrivalCities" class="fs-5 fw-bold cursor-pointer p-3 result"
                      @click="selectCity('arrival', city.properties.label)">
                    {{ city.properties.label }}
                </span>
            </div>
        </div>
        <div class="d-flex justify-content-between p-3 w-100 search_number">
            <div class="d-flex">
                <svg class="me-1" width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.75 10.8333V13H7.58333V10.8333H9.75ZM14.0833 10.8333V13H11.9167V10.8333H14.0833ZM18.4167 10.8333V13H16.25V10.8333H18.4167ZM20.5833 3.24999C21.158 3.24999 21.7091 3.47827 22.1154 3.8846C22.5217 4.29093 22.75 4.84203 22.75 5.41666V20.5833C22.75 21.158 22.5217 21.7091 22.1154 22.1154C21.7091 22.5217 21.158 22.75 20.5833 22.75H5.41667C4.84203 22.75 4.29093 22.5217 3.8846 22.1154C3.47827 21.7091 3.25 21.158 3.25 20.5833V5.41666C3.25 4.84203 3.47827 4.29093 3.8846 3.8846C4.29093 3.47827 4.84203 3.24999 5.41667 3.24999H6.5V1.08333H8.66667V3.24999H17.3333V1.08333H19.5V3.24999H20.5833ZM20.5833 20.5833V8.66666H5.41667V20.5833H20.5833ZM9.75 15.1667V17.3333H7.58333V15.1667H9.75ZM14.0833 15.1667V17.3333H11.9167V15.1667H14.0833ZM18.4167 15.1667V17.3333H16.25V15.1667H18.4167Z" fill="#CBCBCB"/>
                </svg>
                <v-date-picker
                    v-model="departureDate"
                    mode="date"
                    :min-date="new Date()"
                    :popover="{ placement: $screens({ default: 'right' }) }">
                    <template v-slot="{ inputValue, inputEvents }">
                        <input
                            class="px-2 py-1"
                            :value="inputValue"
                            v-on="inputEvents"
                        />
                    </template>
                </v-date-picker>
            </div>
            <div class="d-flex justify-content-between align-items-center nb_passenger_home">
                <div class="me-3">
                    <svg class="me-1" width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_27_134)">
                            <path d="M11.5 7.55745e-06C10.7848 -0.0170939 10.0735 0.108994 9.40778 0.370854C8.74208 0.632713 8.13546 1.02506 7.62362 1.52481C7.11178 2.02456 6.70505 2.62162 6.42735 3.28087C6.14965 3.94012 6.00659 4.64825 6.00659 5.36361C6.00659 6.07896 6.14965 6.78709 6.42735 7.44635C6.70505 8.1056 7.11178 8.70266 7.62362 9.20241C8.13546 9.70216 8.74208 10.0945 9.40778 10.3564C10.0735 10.6182 10.7848 10.7443 11.5 10.7272C12.2151 10.7443 12.9265 10.6182 13.5922 10.3564C14.2579 10.0945 14.8645 9.70216 15.3763 9.20241C15.8882 8.70266 16.2949 8.1056 16.5726 7.44635C16.8503 6.78709 16.9934 6.07896 16.9934 5.36361C16.9934 4.64825 16.8503 3.94012 16.5726 3.28087C16.2949 2.62162 15.8882 2.02456 15.3763 1.52481C14.8645 1.02506 14.2579 0.632713 13.5922 0.370854C12.9265 0.108994 12.2151 -0.0170939 11.5 7.55745e-06ZM8.43332 13.7908C7.00999 13.7908 5.64496 14.3562 4.63851 15.3627C3.63207 16.3691 3.06665 17.7341 3.06665 19.1575V22.9862H19.9333V19.1575C19.9333 17.7341 19.3679 16.3691 18.3615 15.3627C17.355 14.3562 15.99 13.7908 14.5666 13.7908H8.43332Z" fill="#CBCBCB"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_27_134">
                                <rect width="23" height="23" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                    <input type="number" min="1" v-model="nbOfPassengers">
                </div>
                <div class="d-flex align-items-center">
                    <i class="fa fa-minus me-3 cursor-pointer" @click="nbOfPassengers > 1 ? nbOfPassengers-- : nbOfPassengers"></i>
                    <i class="fa fa-plus cursor-pointer" @click="nbOfPassengers++"></i>
                </div>
            </div>
        </div>
        <div class="fw-bold bg-green-app text-white rounded-3 d-flex align-items-center justify-content-center cursor-pointer py-3 w-100"
             style="border-top-left-radius: unset !important; border-top-right-radius: unset !important;"
             @click="searchTrip">
            Rechercher
        </div>
    </div>
</template>

<script>

export default {
    name: "SearchingBarComponent",
    data(){
        return {
            departureCity: '',
            arrivalCity: '',
            departureDate: new Date(),
            nbOfPassengers: 1,
            departureCities: [],
            arrivalCities: []
        }
    },
    methods: {
        searchTrip(){
            if(this.departureCity.trim() !== '' && this.arrivalCity.trim() !== ''){
                const url = new URL(`${window.location}trips`);
                url.searchParams.set('departure', this.departureCity);
                url.searchParams.set('arrival', this.arrivalCity);
                url.searchParams.set('date', this.departureDate.toJSON());
                url.searchParams.set('seats', this.nbOfPassengers);

                window.location = url;
            }
        },
        selectCity(type, city){
            if(type === 'departure'){
                this.departureCity = city;
                this.departureCities = [];
            }else{
                this.arrivalCity = city;
                this.arrivalCities = [];
            }
        },
        async searchCity(type){
            let city;

            if(type === 'departure'){
                city = this.departureCity;
            }else{
                city = this.arrivalCity;
            }

            if(city.trim().length){
                const { data } = await axios.get('https://api-adresse.data.gouv.fr/search/', {
                    params: {
                        q: city,
                        limit: 15,
                        type: 'municipality'
                    }
                });

                const results = data.features;

                if(type === 'departure'){
                    this.departureCities = results;
                }else{
                    this.arrivalCities = results;
                }
            }else{
                this.departureCities = [];
                this.arrivalCities = [];
            }
        }
    }
}
</script>

<style scoped>

</style>

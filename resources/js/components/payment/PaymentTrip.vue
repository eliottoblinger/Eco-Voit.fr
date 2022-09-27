<template>
    <div class="w-50 w-sm-75 mx-auto bg-white p-3 position-relative d-flex flex-column justify-content-around" style="height: 70vh">

        <div v-show="!load" class="container_payment">
            <div class="header_payment">
                <div style="width: 30%;">
                    <h3>Récapitulatif trajet</h3>
                    <hr class="mb-4">
                    <div>
                        <h6 class="mb-3">Aller</h6>
                        <h5>{{ new Date(trip.departure_date)
                            .toLocaleDateString('fr-FR',  { weekday: 'long', month: 'long', day: 'numeric' })
                            .replace(/(^\w|\s\w)/g, m => m.toUpperCase()) }}
                        </h5>
                    </div>

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
                            <div style="margin-left: 15px" class="d-flex flex-column align-items-start" v-else>
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
                    </div>
                    <hr>
                    <div class="mt-4 price_payment">
                        <span><strong>Prix</strong></span>
                        <span>{{ (trip.price / 100).toFixed(2) }} €</span>
                    </div>
                </div>

                <div style="width: 25%;">
                    <h3>Coordonnées client</h3>
                    <hr class="mb-4">
                    <div class="mt-4 price_payment">
                        <span><strong>Nom</strong></span>
                        <span>{{ user.name }}</span>
                    </div>

                    <div class="mt-4 price_payment">
                        <span><strong>Prénom</strong></span>
                        <span>{{ user.surname }}</span>
                    </div>

                    <div class="mt-4 price_payment">
                        <span><strong>Mail</strong></span>
                        <span>{{ user.email }}</span>
                    </div>
                </div>
            </div>


            <div class="payment_component">
                <h3>Paiment</h3>
                <hr class="mb-4">
                <StripeElements
                    v-if="stripeLoaded"
                    v-slot="{ elements, instance }"
                    ref="elms"
                    :stripe-key="stripeKey"
                    :instance-options="instanceOptions"
                    :elements-options="elementsOptions"
                >
                    <StripeElement
                        ref="card"
                        :elements="elements"
                        :options="cardOptions"
                    />
                </StripeElements>
            </div>

            <div class="action_payment mt-4">
                <button type="button" class="btn btn-dark btn-lg shadow-none mb-3 me-3" @click="pay">Réserver</button>
            </div>

            <span class="text-success fs-sm fw-light" v-if="success">Paiement effectué avec succès, vous allez être redirigé</span>

            <div :style="styleAlert" class="modal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Paiement refusé</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" @click="closeModal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Une erreur est survenue, le paiement n'a pas pû être effectué</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" @click="closeModal" data-bs-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div v-show="load" class="spinner-border" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

</template>

<script>
import { StripeElements, StripeElement } from 'vue-stripe-js'
import { loadStripe } from '@stripe/stripe-js'
import { ref, onBeforeMount } from 'vue'
import {mapGetters} from "vuex";

export default {
    name: 'PaymentTrip',
    props: {
        trip: Object,
        user: Object
    },
    data(){
        return {
            error: false,
            success: false,
            styleAlert: "display: none",
            load: false
        }
    },
    components: {
        StripeElements,
        StripeElement,
    },
    setup() {
        const stripeKey = ref('pk_test_51LkYdKG2x14CtAPXO9aMANo3H5AjEcHOrJn4i1sBZ6ggX3dhcvlWRXrHlLf43mNlWZjLvLIAaBkBAEDeMduLNnHA00VIVXiq5F') // test key
        const instanceOptions = ref({
            // https://stripe.com/docs/js/initializing#init_stripe_js-options
        })
        const elementsOptions = ref({
            // https://stripe.com/docs/js/elements_object/create#stripe_elements-options
        })
        const cardOptions = ref({
            // https://stripe.com/docs/stripe.js#element-options
        })
        const stripeLoaded = ref(false)
        const card = ref()
        const elms = ref()

        onBeforeMount(() => {
            const stripePromise = loadStripe(stripeKey.value)
            stripePromise.then(() => {
                stripeLoaded.value = true
            })
        })

        return {
            stripeKey,
            stripeLoaded,
            instanceOptions,
            elementsOptions,
            cardOptions,
            card,
            elms,
        }
    },

    methods: {
        async pay() {
            this.error = false;
            this.success = false;

            this.load = true;

            const cardElement = this.card.stripeElement;

            const {data} = await axios.post('/pay', {
                amount: this.trip.price
            });


            const result = await this.elms.instance.confirmCardPayment(data.client_secret, {
                payment_method: {
                    card: cardElement,
                    billing_details: {
                        name: `${this.user.surname} ${this.user.name}`,
                    },
                },
            });

            if(result.error){
                this.load = false;
                this.error = true;
                this.styleAlert = "display: block";
            }else if(result.paymentIntent){
                await axios.post(`/trips/${this.trip.id}/reserve`);

                this.success = true;
                this.load = false;
            }


        },
        closeModal() {
            this.styleAlert = "display: none";
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

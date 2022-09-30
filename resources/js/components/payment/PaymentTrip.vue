<template>
    <div class="template_payment mx-auto bg-white p-3 position-relative d-flex flex-column justify-content-around">
        <div v-show="!load && !success" class="container_payment">
            <div class="header_payment">
                <div class="components_payment" style="width: 30%;">
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
                            <div class="d-flex flex-column justify-content-between h-100">
                                <div class="d-flex flex-column">
                                    <span>{{ getHours(trip.departure_date) }}</span>
                                    <span class="text-muted">{{ scToHours(trip.duration) }}</span>
                                </div>
                                <span>{{ getHours(new Date( Date.parse(trip.departure_date) + trip.duration*1000 )) }}</span>
                            </div>
                        </div>
                        <div class="col-7">
                            <div style="margin-left: 25px; width: 20vw" class="d-flex flex-column align-items-start">
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
                    <div class="mt-4 price_payment d-flex justify-content-between">
                        <span><strong>Prix</strong></span>
                        <span>{{ (trip.price / 100).toFixed(2) }} €</span>
                    </div>
                </div>

                <div class="components_payment" style="width: 25%;">
                    <h3>Coordonnées client</h3>
                    <hr class="mb-4">
                    <div class="mt-4 price_payment d-flex justify-content-between">
                        <span><strong>Nom</strong></span>
                        <span>{{ user.name }}</span>
                    </div>

                    <div class="mt-4 price_payment d-flex justify-content-between">
                        <span><strong>Prénom</strong></span>
                        <span>{{ user.surname }}</span>
                    </div>

                    <div class="mt-4 price_payment d-flex justify-content-between">
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

            <div :style="styleAlert" class="modal mod_payment" tabindex="-1">
                <div class="modal-dialog modal-dialog-payment">
                    <div class="modal-content">
                        <div class="modal-header bg-danger text-white">
                            <h5 class="modal-title">Paiement refusé</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" @click="closeModal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Une erreur est survenue, le paiement n'a pas pû être effectué</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" @click="closeModal" data-bs-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-show="load" class="text-center">
            <div class="spinner-grow text-success" style="width: 3rem; height: 3rem;" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>

        <div v-if="success" class="animate_check">
            <div class="slide-fwd-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="95" viewBox="0 0 68 63" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M26.8006 18.0007C28.1273 17.8948 29.3868 17.3729 30.3997 16.5095C31.5437 15.5351 32.9973 15 34.5 15C36.0027 15 37.4563 15.5351 38.6003 16.5095C39.6132 17.3729 40.8727 17.8948 42.1994 18.0007C43.6977 18.1204 45.1044 18.77 46.1672 19.8328C47.2301 20.8956 47.8796 22.3023 47.9993 23.8006C48.1045 25.1268 48.6263 26.387 49.4905 27.3997C50.4649 28.5437 51 29.9973 51 31.5C51 33.0027 50.4649 34.4563 49.4905 35.6003C48.6271 36.6132 48.1052 37.8727 47.9993 39.1994C47.8796 40.6977 47.2301 42.1044 46.1672 43.1672C45.1044 44.2301 43.6977 44.8796 42.1994 44.9993C40.8727 45.1052 39.6132 45.6271 38.6003 46.4905C37.4563 47.4649 36.0027 48 34.5 48C32.9973 48 31.5437 47.4649 30.3997 46.4905C29.3868 45.6271 28.1273 45.1052 26.8006 44.9993C25.3023 44.8796 23.8956 44.2301 22.8328 43.1672C21.77 42.1044 21.1204 40.6977 21.0007 39.1994C20.8948 37.8727 20.3729 36.6132 19.5095 35.6003C18.5351 34.4563 18 33.0027 18 31.5C18 29.9973 18.5351 28.5437 19.5095 27.3997C20.3729 26.3868 20.8948 25.1273 21.0007 23.8006C21.1204 22.3023 21.77 20.8956 22.8328 19.8328C23.8956 18.77 25.3023 18.1204 26.8006 18.0007V18.0007ZM42.1458 28.8331C42.5215 28.4441 42.7294 27.9231 42.7247 27.3824C42.72 26.8416 42.5031 26.3243 42.1207 25.9418C41.7383 25.5594 41.221 25.3425 40.6802 25.3378C40.1394 25.3331 39.6184 25.541 39.2294 25.9167L32.4375 32.7086L29.7706 30.0418C29.3816 29.6661 28.8606 29.4582 28.3198 29.4629C27.779 29.4676 27.2617 29.6845 26.8793 30.0669C26.4969 30.4493 26.28 30.9666 26.2753 31.5074C26.2706 32.0482 26.4785 32.5692 26.8542 32.9582L30.9793 37.0833C31.366 37.47 31.8906 37.6872 32.4375 37.6872C32.9844 37.6872 33.5089 37.47 33.8957 37.0833L42.1458 28.8331V28.8331Z" fill="#346751"/>
                    <rect x="51.9387" y="50.7226" width="2.52624" height="8.36818" transform="rotate(-48 51.9387 50.7226)" fill="#346751" fill-opacity="0.85"/>
                    <circle cx="52.7839" cy="49.7839" r="1.26312" transform="rotate(-48 52.7839 49.7839)" fill="#4E7A67"/>
                    <circle cx="58.8852" cy="55.2776" r="1.26312" transform="rotate(-48 58.8852 55.2776)" fill="#4E7A67"/>
                    <rect x="17.04" y="48.8453" width="2.52624" height="8.36818" transform="rotate(48 17.04 48.8453)" fill="#346751" fill-opacity="0.85"/>
                    <circle cx="17.8853" cy="49.7839" r="1.26312" transform="rotate(48 17.8853 49.7839)" fill="#4E7A67"/>
                    <circle cx="11.784" cy="55.2776" r="1.26312" transform="rotate(48 11.784 55.2776)" fill="#4E7A67"/>
                    <rect x="57.04" y="6.84531" width="2.52624" height="8.36818" transform="rotate(48 57.04 6.84531)" fill="#346751" fill-opacity="0.85"/>
                    <circle cx="57.8853" cy="7.78388" r="1.26312" transform="rotate(48 57.8853 7.78388)" fill="#4E7A67"/>
                    <circle cx="51.784" cy="13.2776" r="1.26312" transform="rotate(48 51.784 13.2776)" fill="#4E7A67"/>
                    <rect x="34" y="53.2632" width="2.52624" height="8.36818" fill="#346751" fill-opacity="0.85"/>
                    <circle cx="35.2631" cy="53.2631" r="1.26312" fill="#4E7A67"/>
                    <circle cx="35.2631" cy="61.4734" r="1.26312" fill="#4E7A67"/>
                    <rect x="58.2632" y="33.5262" width="2.52624" height="8.36818" transform="rotate(-90 58.2632 33.5262)" fill="#346751" fill-opacity="0.85"/>
                    <circle cx="58.2631" cy="32.2631" r="1.26312" transform="rotate(-90 58.2631 32.2631)" fill="#4E7A67"/>
                    <circle cx="66.4733" cy="32.2632" r="1.26312" transform="rotate(-90 66.4733 32.2632)" fill="#4E7A67"/>
                    <rect x="1.26318" y="33.5262" width="2.52624" height="8.36818" transform="rotate(-90 1.26318 33.5262)" fill="#346751" fill-opacity="0.85"/>
                    <circle cx="1.26312" cy="32.2631" r="1.26312" transform="rotate(-90 1.26312 32.2631)" fill="#4E7A67"/>
                    <circle cx="9.47333" cy="32.2632" r="1.26312" transform="rotate(-90 9.47333 32.2632)" fill="#4E7A67"/>
                    <rect x="34" y="1.2632" width="2.52624" height="8.36818" fill="#346751" fill-opacity="0.85"/>
                    <circle cx="35.2631" cy="1.26312" r="1.26312" fill="#4E7A67"/>
                    <circle cx="35.2631" cy="9.47339" r="1.26312" fill="#4E7A67"/>
                    <rect x="9.93872" y="8.72256" width="2.52624" height="8.36818" transform="rotate(-48 9.93872 8.72256)" fill="#346751" fill-opacity="0.85"/>
                    <circle cx="10.7839" cy="7.78388" r="1.26312" transform="rotate(-48 10.7839 7.78388)" fill="#4E7A67"/>
                    <circle cx="16.8852" cy="13.2776" r="1.26312" transform="rotate(-48 16.8852 13.2776)" fill="#4E7A67"/>
                </svg>
            </div>
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

                setTimeout(this.redirection, 1200)
            }
        },
        closeModal() {
            this.styleAlert = "display: none";
        },
        redirection() {
            location.href = '/account';
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

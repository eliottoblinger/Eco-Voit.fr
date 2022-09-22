<template>
    <div class="w-50 mx-auto bg-white p-3 position-relative" style="height: 400px">
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
        <span class="text-danger fs-sm fw-light" v-if="error">Une erreur est survenue, le paiement n'a pas pû être effectué</span>
        <span class="text-success fs-sm fw-light" v-if="success">Paiement effectué avec succès, vous allez être redirigé</span>
        <button type="button" class="btn btn-dark btn-lg shadow-none position-absolute bottom-0 end-0 mb-3 me-3" @click="pay">Réserver</button>
    </div>
</template>

<script>
import { StripeElements, StripeElement } from 'vue-stripe-js'
import { loadStripe } from '@stripe/stripe-js'
import { ref, onBeforeMount } from 'vue'

export default {
    name: 'PaymentTrip',
    props: {
        trip: Object,
        user: Object
    },
    data(){
        return {
            error: false,
            success: false
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
                this.error = true;
            }else if(result.paymentIntent){
                await axios.post(`/trips/${this.trip.id}/reserve`);

                this.success = true;
            }
        },
    },
}
</script>

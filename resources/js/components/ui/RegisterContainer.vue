<template>
    <div>
        <div class="col-12 d-flex mt-1 justify-content-center align-items-start" style="height: 10%">
            <div class="me-3 flex-row" style="width: 34%">
                <input class="input-auth-app fs-5 w-100" type="text" placeholder="Nom" v-model="name">
            </div>
            <div class="flex-row" style="width: 34%">
                <input class="input-auth-app fs-5 w-100" type="text" placeholder="Prénom" v-model="firstName">
            </div>
        </div>

        <div class="col-12 d-flex justify-content-center mt-4 align-items-start">
            <div class="flex-row" style="width: 70%">
                <input class="input-auth-app fs-5 w-100" type="text" placeholder="Votre e-mail" v-model="email">
            </div>
        </div>

        <div class="col-12 d-flex justify-content-center mt-4 align-items-start">
            <div class="flex-row" style="width: 70%">
                <input :class="[statusPassword === 2 ? 'input-auth-app' : (statusPassword === 0 ? 'input-auth-error-app' : 'input-auth-success-app'), 'fs-5 w-100']" type="password" placeholder="Mot de passe" v-model="password">
                <span :style="[statusPassword === 1 ? 'color: green' : 'color: red']">{{ messagePassword }}</span>
            </div>
        </div>

        <div class="col-12 d-flex justify-content-center mt-4 align-items-start">
            <div class="flex-row" style="width: 70%">
                <input class="input-auth-app fs-5 w-100" type="password" placeholder="Comfirmer votre mot de passe" v-model="confirmPassword">
            </div>
        </div>

        <div class="col-12 d-flex justify-content-center mt-4 align-items-start">
            <div class="flex-row" style="width: 70%">
                <v-date-picker
                    v-model="birthDate"
                    mode="date"
                    :popover="{ placement: $screens({ default: 'left' }) }"
                    is24hr>
                    <template v-slot="{ inputValue, inputEvents }">
                        <input
                            class="input-auth-app fs-5 w-100"
                            :value="inputValue"
                            v-on="inputEvents"
                        />
                    </template>
                </v-date-picker>
            </div>
        </div>
    </div>

    <div>
        <div class="col-12 d-flex justify-content-center mt-3 align-items-start">
            <button type="button" class="btn btn-lg btn-block bg-green-app" style="width: 70%; color: white" @click="submit">Rejoindre</button>
        </div>
        <div class="col-12 d-flex justify-content-center mt-3 align-items-start">
            <a class="link-register-app" href="" style="width: 70%">Se connecter à un compte existant</a>
        </div>
    </div>
</template>

<script>
export default {
    name: "RegisterContainer",
    data() {
        return {
            birthDate: new Date("10/23/1999"),
            name: "",
            firstName: "",
            email: "",
            password: "",
            confirmPassword: "",
            messagePassword: "",
            regex: new RegExp('^(?=.*[A-Za-z])(?=.*\\d)(?=.*[@$!%*#?&])[A-Za-z\\d@$!%*#?&]{8,}$'),
            statusPassword: 2
        }
    },
    methods: {
        submit: function () {

        }
    },
    watch: {
        password(value) {
            if(value.trim() !== '' && !this.regex.test(value)){
                this.messagePassword = "Votre mot de passe doit comporter au moins 8 caractères, dont un chiffre, une lettre minuscule et un caractère spécial."
                this.statusPassword = 0
            }else if(value.trim() !== '' && this.regex.test(value)){
                this.messagePassword = 'Votre mot de passe est valide.'
                this.statusPassword = 1
            }else{
                this.messagePassword = ''
                this.statusPassword = 2
            }
            console.log(value)
        }
    }
}
</script>

<style scoped>

</style>

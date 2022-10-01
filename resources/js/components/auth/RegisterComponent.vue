<template>
    <div class="d-flex flex-column align-items-center justify-content-center py-5 mx-3 px-5" style="height: 75vh; min-width: 30vw; max-width: 80vw">
        <div class="row mb-5">
            <div class="col-12">
                <h1 class="border-bottom pb-1 pb-lg-3 border-dark fs-2">Inscription</h1>
            </div>
        </div>
        <div class="row my-3 w-100">
            <div class="col-12 col-md-6">
                <input class="input-auth-app fs-5 me-3 w-100" type="text" placeholder="Nom" v-model="name">
            </div>
            <div class="col-12 col-md-6 mt-4 mt-md-0">
                <input class="input-auth-app fs-5 w-100" type="text" placeholder="Prénom" v-model="surname">
            </div>
        </div>
        <div class="row my-3 w-100">
            <div class="col-12">
                <input class="input-auth-app fs-5 w-100" type="text" placeholder="Votre e-mail" v-model="email">
            </div>
        </div>

        <div class="row my-3 w-100">
            <div class="col-12">
                <input :class="[statusPassword === 2 ? 'input-auth-app' : (statusPassword === 0 ? 'input-auth-error-app' : 'input-auth-success-app'), 'fs-5 w-100']" type="password" placeholder="Mot de passe" v-model="password">
                <svg data-bs-toggle="tooltip" title="" data-bs-placement="bottom"
                     :data-bs-original-title="[statusPassword === 1 ? 'Votre mot de passe est valide.' : 'Votre mot de passe doit comporter au moins 8 caractères dont un chiffre, une lettre minuscule et un caractère spécial.']"
                     class="position-absolute mt-1"
                     :style="[statusPassword === 2 ? 'color: black' : (statusPassword === 1 ? 'color: green' : 'color: red')]"
                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" d="M12 7h.01"/><path stroke-linecap="round" stroke-linejoin="round" d="M10 11h2v5m-2 0h4"/></g></svg>
            </div>
        </div>

        <div class="row my-3 w-100">
            <div class="col-12">
                <input class="input-auth-app fs-5 w-100" type="password" placeholder="Confirmer votre mot de passe" v-model="confirmPassword">
            </div>
        </div>

        <div class="row my-3 w-100">
            <div class="col-12">
                <span class="fs-sm text-muted">
                    Date de naissance
                </span>
                <v-date-picker
                    v-model="birthDate"
                    mode="date"
                    :popover="{ placement: $screens({ default: 'left' }) }"
                    :max-date="(new Date(Date.now() - (new Date()).getTimezoneOffset() * 60000)).toISOString().substr(0, 10)"
                    min-date="1950-01-01"
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

        <div class="row my-3 w-100">
            <div class="col-12 d-grid">
                <button type="button" :class="[isFormValid ? '' : 'disabled', 'btn btn-lg d-flex justify-content-center align-items-center btn-block bg-green-app text-white shadow-none']" style="height: 30px;"
                        @click="submit"
                >
                    Rejoindre
                </button>
            </div>
            <div class="col-12 d-grid">
                <a class="link-register-app mt-1" href="/login">Se connecter à un compte existant</a>
            </div>
        </div>
    </div>


</template>

<script>
export default {
    name: "RegisterComponent",
    mounted(){
        let tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        console.log(tooltipTriggerList)
        let tooltipList = tooltipTriggerList.map(function(element){
            return new bootstrap.Tooltip(element);
        });
    },
    data() {
        return {
            birthDate: new Date("10/23/1999"),
            name: "",
            surname: "",
            email: "",
            password: "",
            confirmPassword: "",
            regex: new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9_])"),
            statusPassword: 2
        }
    },
    computed: {
        isFormValid: function () {
            return this.name.trim() !== '' &&
                this.surname.trim() !== '' &&
                this.email.trim() !== '' &&
                this.regex.test(this.password) &&
                this.password === this.confirmPassword;

        }
    },
    methods: {
        submit: async function () {
            if(this.isFormValid){
                const user = {
                    name: this.name,
                    surname: this.surname,
                    email: this.email,
                    password: this.password,
                    birthDate: this.birthDate
                }

                await this.axios.post('/register', {
                    user: user
                });

                location.href = '/login';
            }
        }
    },
    watch: {
        password(value) {
            if(value.trim() !== '' && !this.regex.test(value)){
                this.statusPassword = 0
            }else if(value.trim() !== '' && this.regex.test(value)){
                this.statusPassword = 1
            }else{
                this.statusPassword = 2
            }
        }
    }
}
</script>

<style scoped>

</style>

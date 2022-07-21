<template>
    <div class="d-flex flex-column align-items-center justify-content-evenly py-5 mx-3 px-lg-5" style="height: 75vh; min-width: 30vw; max-width: 80vw">
        <div>
            <div>
                <h1 style=" padding-bottom: 1px; background: linear-gradient(to right, black, black); background-repeat: no-repeat; background-size: 50px 2px; background-position: 50% 100%; text-align: center" class="pb-1 pb-lg-3 fs-2 text-center">Connexion</h1>
            </div>
            <div>
                <h5 class="mt-lg-3 mt-4">Utiliser votre compte Eco-Voit</h5>
            </div>
        </div>

        <div class="my-3 w-75 mt-5 mt-md-0">
            <div class="row my-3 w-100 ">
                <div class="col-12">
                    <input class="input-auth-app fs-5 me-3 w-100"  type="text" placeholder="Votre email" v-model="email">
                </div>
            </div>

            <div class="row my-3 w-100">
                <div class="col-12 mt-3">
                    <input @keyup.enter="submit" :class="[statusPassword === 2 ? 'input-auth-app' : (statusPassword === 0 ? 'input-auth-error-app' : 'input-auth-success-app'), 'fs-5 w-100']" type="password" placeholder="Mot de passe" v-model="password">
                    <svg data-bs-toggle="tooltip" title="" data-bs-placement="bottom"
                         :data-bs-original-title="[statusPassword === 1 ? 'Votre mot de passe est valide.' : 'Votre mot de passe doit comporter au moins 8 caractères dont un chiffre, une lettre minuscule et un caractère spécial.']"
                         class="position-absolute mt-1"
                         :style="[statusPassword === 2 ? 'color: black' : (statusPassword === 1 ? 'color: green' : 'color: red')]"
                         xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" d="M12 7h.01"/><path stroke-linecap="round" stroke-linejoin="round" d="M10 11h2v5m-2 0h4"/></g></svg>
                </div>

                <div class="row my-3 w-100">
                    <div class="col-12">
                        <label class="text-danger">{{ this.error }}</label>
                    </div>
                </div>

            </div>
        </div>


        <div class="row my-3 w-75">
            <div class="row my-3 w-100">
                <div class="col-12 d-grid">
                    <button type="button" class="btn btn-lg d-flex justify-content-center align-items-center btn-block bg-green-app text-white shadow-none" style="height: 40px;" @click="submit">Se connecter</button>
                </div>
            </div>

            <div class="row my-3 w-100 ">
                <div class="col-md-6 col-sm-12 d-none d-lg-block">
                    <input type="checkbox" id="checkbox" v-model="checked">
                    <label class="mx-2" for="checkbox">Se souvenir de moi</label>
                </div>

                <div class="col-md-6 col-sm-12">
                    <a class="link-register-app mt-1 fs-6 d-flex justify-content-md-end justify-content-center" href="">Mot de passe oubliée ?</a>
                </div>

                <div class="row col-12 mt-3">
                    <label class="link-register-app mt-1 fs-6 d-flex justify-content-center">Pas de compte ?
                        <a class="link-register-app" href="/register" style="color: #346751">&ensp; <strong>Incription</strong></a>
                    </label>
                </div>
            </div>
        </div>

    </div>

</template>

<script>
export default {
    name: "LoginComponent",
    mounted(){
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function(element){
            return new bootstrap.Tooltip(element);
        });
    },
    data() {
        return {
            email: "",
            password: "",
            regex: new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9_])"),
            statusPassword: 2,
            checked: false,
            error: ""
        }
    },
    methods: {
        submit: async function () {
            if (this.email && this.password) {
                const { data } = await this.axios.post('/login', { email: this.email, password: this.password });

                if(data.status !== 500) {
                    this.error = "";
                    location.href = "/";
                } else {
                    this.error = "Impossible de trouver votre compte Eco-Voit.";
                }
            } else {
                this.error = "Veuillez renseigner votre mot de passe.";
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

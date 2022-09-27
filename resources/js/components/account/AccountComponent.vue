<template>
    <div class="min-vh-100 bg-gray-light-app d-flex align-items-center flex-row justify-content-center py-5 mx-3 px-lg-5">
        <div class="bg-white shadow-lg position-relative d-flex flex-column" style="width: 60vw; margin-top: 7vh; height: 92vh">
            <div class="position-absolute top-0 start-50 translate-middle">
                <div v-if="user.avatar_url" :style="`width:100px;
                            height:100px;
                            border-radius:50%;
                            z-index: 99999;
                            background-image: url(${user.avatar_url});
                            background-position: center;
                            background-size:100% auto;
                            background-repeat: no-repeat;`">
                </div>
            </div>

            <div class="d-flex justify-content-center mt-3 p-3">
                 <span class="fs-2 mt-3 p-3">
                    {{ user.surname.charAt(0).toUpperCase() + user.surname.slice(1) }} {{ user.name.charAt(0).toUpperCase() + user.name.slice(1) }}
                </span>
            </div>

            <div class="d-flex justify-content-center">
                <div class="d-flex flex-row justify-content-center">
                    <div class="d-flex flex-column" style="margin-right: 5vw">
                        <div class="text-center fs-2">{{ user.trips.length }}</div>
                        <div class="text-center fs-4">
                            <span v-if="user.trips.length > 1">Trajets</span>
                            <span v-else>Trajet</span>
                        </div>
                    </div>
                    <div class="d-flex flex-column" style="margin-right: 5vw">
                        <div class="text-center fs-2">0</div>
                        <div class="text-center fs-4">Emprunte</div>
                    </div>
                    <div class="d-flex flex-column">
                        <div class="text-center fs-2">{{ this.comment }}</div>
                        <div class="text-center fs-4">Avis</div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center mt-3 p-3">
                <div class="d-flex flex-column justify-content-center align-items-center cursor-pointer" @click="setRoute(1)">
                    <span class="fs-4">
                        Mes informations
                    </span>
                    <button class="btn-register-app"><hr class="my-4 vertical-line" v-bind:style="styleInformation"></button>
                </div>
                <div class="d-flex flex-column justify-content-center align-items-center cursor-pointer" @click="setRoute(2)">
                    <span class="fs-4">
                        Mon compte
                    </span>
                    <button class="btn-register-app d-flex align-items-center"><hr class="my-4" v-bind:style="styleMyAccount"></button>
                </div>
            </div>
            <div class="" style="max-height: 60vh; overflow-y: auto;">
                <div v-if="route === 1">
                    <div class="row my-3 w-75" style="margin-left: 6.5vw">
                        <div class="row my-3 w-100">
                            <div class="col-12 d-flex flex-row fs-5">
                                <button style="text-align: left;" class="btn-register-app" @click="setRoute(6)">
                                    <svg class="me-4" width="31" height="30" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.0167 0C23.3005 0 30.0167 6.71625 30.0167 15C30.0167 23.2838 23.3005 30 15.0167 30C6.73297 30 0.0167236 23.2838 0.0167236 15C0.0167236 6.71625 6.73297 0 15.0167 0ZM15.0167 1.875C7.76797 1.875 1.89172 7.75125 1.89172 15C1.89172 22.2488 7.76797 28.125 15.0167 28.125C22.2655 28.125 28.1417 22.2488 28.1417 15C28.1417 7.75125 22.2655 1.875 15.0167 1.875ZM15.0167 7.5C15.2654 7.5 15.5038 7.59877 15.6796 7.77459C15.8555 7.9504 15.9542 8.18886 15.9542 8.4375V14.0625H21.5792C21.8279 14.0625 22.0663 14.1613 22.2421 14.3371C22.418 14.5129 22.5167 14.7514 22.5167 15C22.5167 15.2486 22.418 15.4871 22.2421 15.6629C22.0663 15.8387 21.8279 15.9375 21.5792 15.9375H15.9542V21.5625C15.9542 21.8111 15.8555 22.0496 15.6796 22.2254C15.5038 22.4012 15.2654 22.5 15.0167 22.5C14.7681 22.5 14.5296 22.4012 14.3538 22.2254C14.178 22.0496 14.0792 21.8111 14.0792 21.5625V15.9375H8.45422C8.20558 15.9375 7.96713 15.8387 7.79131 15.6629C7.6155 15.4871 7.51672 15.2486 7.51672 15C7.51672 14.7514 7.6155 14.5129 7.79131 14.3371C7.96713 14.1613 8.20558 14.0625 8.45422 14.0625H14.0792V8.4375C14.0792 8.18886 14.178 7.9504 14.3538 7.77459C14.5296 7.59877 14.7681 7.5 15.0167 7.5Z" fill="#346751"/>
                                    </svg>
                                    Ajouter une photo de profil
                                </button>
                            </div>
                            <div class="col-12 d-grid fs-5 mt-3">
                                <button style="text-align: left;" class="btn-register-app" @click="setRoute(7)">
                                    Modifier mes information personnelles
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center" >
                        <hr class="my-4" style="width: 50vw;">
                    </div>

                    <div class="row my-3 w-75" style="margin-left: 6.5vw">
                        <div class="row my-3 w-100">
                            <div class="col-12 d-grid fs-4 text-green-app">Mes trajets</div>
                            <div class="col-12 d-flex flex-row fs-5 mt-4">
                                <button class="btn-register-app" @click="setRoute(8)">
                                    <svg class="me-4" width="31" height="30" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.0167 0C23.3005 0 30.0167 6.71625 30.0167 15C30.0167 23.2838 23.3005 30 15.0167 30C6.73297 30 0.0167236 23.2838 0.0167236 15C0.0167236 6.71625 6.73297 0 15.0167 0ZM15.0167 1.875C7.76797 1.875 1.89172 7.75125 1.89172 15C1.89172 22.2488 7.76797 28.125 15.0167 28.125C22.2655 28.125 28.1417 22.2488 28.1417 15C28.1417 7.75125 22.2655 1.875 15.0167 1.875ZM15.0167 7.5C15.2654 7.5 15.5038 7.59877 15.6796 7.77459C15.8555 7.9504 15.9542 8.18886 15.9542 8.4375V14.0625H21.5792C21.8279 14.0625 22.0663 14.1613 22.2421 14.3371C22.418 14.5129 22.5167 14.7514 22.5167 15C22.5167 15.2486 22.418 15.4871 22.2421 15.6629C22.0663 15.8387 21.8279 15.9375 21.5792 15.9375H15.9542V21.5625C15.9542 21.8111 15.8555 22.0496 15.6796 22.2254C15.5038 22.4012 15.2654 22.5 15.0167 22.5C14.7681 22.5 14.5296 22.4012 14.3538 22.2254C14.178 22.0496 14.0792 21.8111 14.0792 21.5625V15.9375H8.45422C8.20558 15.9375 7.96713 15.8387 7.79131 15.6629C7.6155 15.4871 7.51672 15.2486 7.51672 15C7.51672 14.7514 7.6155 14.5129 7.79131 14.3371C7.96713 14.1613 8.20558 14.0625 8.45422 14.0625H14.0792V8.4375C14.0792 8.18886 14.178 7.9504 14.3538 7.77459C14.5296 7.59877 14.7681 7.5 15.0167 7.5Z" fill="#346751"/>
                                    </svg>
                                    Gérer mes trajets
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center" >
                        <hr class="my-4" style="width: 50vw;">
                    </div>

                    <div class="row my-3 w-75 mb-5" style="margin-left: 6.5vw">
                        <div class="row my-3 w-100">
                            <div class="col-12 d-grid fs-4 text-green-app">Quelques mots sur vous</div>
                            <div class="col-12 d-flex flex-row fs-5 mt-4">
                                <button class="btn-register-app" @click="setRoute(9)">
                                    <svg class="me-4" width="31" height="30" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.0167 0C23.3005 0 30.0167 6.71625 30.0167 15C30.0167 23.2838 23.3005 30 15.0167 30C6.73297 30 0.0167236 23.2838 0.0167236 15C0.0167236 6.71625 6.73297 0 15.0167 0ZM15.0167 1.875C7.76797 1.875 1.89172 7.75125 1.89172 15C1.89172 22.2488 7.76797 28.125 15.0167 28.125C22.2655 28.125 28.1417 22.2488 28.1417 15C28.1417 7.75125 22.2655 1.875 15.0167 1.875ZM15.0167 7.5C15.2654 7.5 15.5038 7.59877 15.6796 7.77459C15.8555 7.9504 15.9542 8.18886 15.9542 8.4375V14.0625H21.5792C21.8279 14.0625 22.0663 14.1613 22.2421 14.3371C22.418 14.5129 22.5167 14.7514 22.5167 15C22.5167 15.2486 22.418 15.4871 22.2421 15.6629C22.0663 15.8387 21.8279 15.9375 21.5792 15.9375H15.9542V21.5625C15.9542 21.8111 15.8555 22.0496 15.6796 22.2254C15.5038 22.4012 15.2654 22.5 15.0167 22.5C14.7681 22.5 14.5296 22.4012 14.3538 22.2254C14.178 22.0496 14.0792 21.8111 14.0792 21.5625V15.9375H8.45422C8.20558 15.9375 7.96713 15.8387 7.79131 15.6629C7.6155 15.4871 7.51672 15.2486 7.51672 15C7.51672 14.7514 7.6155 14.5129 7.79131 14.3371C7.96713 14.1613 8.20558 14.0625 8.45422 14.0625H14.0792V8.4375C14.0792 8.18886 14.178 7.9504 14.3538 7.77459C14.5296 7.59877 14.7681 7.5 15.0167 7.5Z" fill="#346751"/>
                                    </svg>
                                    Ajouter une description
                                </button>
                            </div>
                        </div>
                    </div>

                </div>

                <div v-else-if="route === 2">
                    <div class="row my-3 w-75" style="margin-left: 6.5vw">
                        <div class="row my-3 w-100">
                            <div class="col-12 d-flex flex-row fs-5">
                                <button class="btn-register-app" @click="setRoute(3)">Modifier mon e-mail</button>
                            </div>
                            <div class="col-12 d-flex fs-5 mt-3">
                                <button class="btn-register-app" @click="setRoute(4)">Mot de passe</button>
                            </div>
                            <div class="col-12 d-flex fs-5 mt-3">
                                <button class="btn-register-app" @click="setRoute(5)">Mes véhicules</button>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex mt-4 justify-content-center" >
                        <hr class="mt-3" style="width: 50vw;">
                    </div>

                    <div class="row w-75" style="margin-left: 6.5vw">
                        <div class="row w-100">
                            <div class="col-12 d-flex flex-row fs-5 mt-3">
                                <a class="link-register-app" href="/delete-account">
                                    Fermer mon compte
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex mt-4 justify-content-center" >
                        <hr class="mt-3" style="width: 50vw;">
                    </div>

                    <div class="row w-75" style="margin-left: 6.5vw">
                        <div class="row w-100">
                            <div class="col-12 d-flex flex-row fs-5 mt-3">
                                <a class="link-register-app" href="/logout">
                                    Déconnexion
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div v-else-if="route === 3">
                    <div class="row my-3 w-75" style="margin-left: 6.5vw">
                        <label class="fs-5 mb-3">Modifier votre mail</label>
                        <div class="input-group mb-3">
                            <input type="email" v-model="mail" class="form-control input-auth-app" aria-label="E_mail" aria-describedby="basic-addon1">
                        </div>
                        <div class="d-flex justify-content-center mt-5">
                            <button type="submit" class="btn btn-lg bg-green-app text-white text-center rounded" @click="updateEmail">Enregistrer</button>
                        </div>
                    </div>
                </div>

                <div v-else-if="route === 4">
                    <div class="row my-3 w-75" style="margin-left: 6.5vw">
                        <label class="fs-5 mb-3">Modifier votre mot de passe</label>
                        <div class="input-group mb-3">
                            <input style="padding-left: 20px;" placeholder="Nouveau mot de passe" @keyup.enter="submit" :class="[statusPassword === 2 ? 'input-auth-app' : (statusPassword === 0 ? 'input-auth-error-app' : 'input-auth-success-app'), 'fs-5 w-100']" type="password" v-model="password">
                            <svg data-bs-toggle="tooltip" title="" data-bs-placement="bottom"
                                 :data-bs-original-title="[statusPassword === 1 ? 'Votre mot de passe est valide.' : 'Votre mot de passe doit comporter au moins 8 caractères dont un chiffre, une lettre minuscule et un caractère spécial.']"
                                 class="position-absolute mt-1"
                                 :style="[statusPassword === 2 ? 'color: black' : (statusPassword === 1 ? 'color: green' : 'color: red')]"
                                 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" d="M12 7h.01"/><path stroke-linecap="round" stroke-linejoin="round" d="M10 11h2v5m-2 0h4"/></g></svg>
                        </div>
                        <div class="d-flex justify-content-center mt-5">
                            <button :disabled="statusPassword === 1 ? false : true" @click="updatePassword" class="btn btn-lg bg-green-app text-white text-center rounded">Enregistrer</button>
                        </div>
                    </div>
                </div>

                <div v-else-if="route === 5">
                    <div class="row my-3 w-75" style="margin-left: 6.5vw">

                    </div>
                </div>

                <div v-else-if="route === 6">
                    <div class="row my-3 w-75" style="margin-left: 6.5vw">
                        <div class="input-group mb-3">
                            <div class="row my-3 w-75" style="margin-left: 6.5vw">
                                <label class="fs-5" for="avatar">Ajouter ma photo de profil (png/jpeg)</label>
                            </div>

                            <div class="row my-3 w-75" style="margin-left: 6.5vw">
                                <input type="file" @change="onChange($event)" id="avatar" name="avatar" accept="image/png, image/jpeg">
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-5">
                            <button class="btn btn-lg bg-green-app text-white text-center rounded" @click="sendPicture">Valider</button>
                        </div>
                    </div>
                </div>

                <div v-else-if="route === 7">
                    <div class="row my-3 w-75" style="margin-left: 6.5vw">
                        <div class="input-group mb-3">
                            <div class="row my-3 w-75" style="margin-left: 6.5vw">
                                <label class="fs-5">Nom</label>
                                <input type="text" v-model="name" class="form-control input-auth-app" aria-label="name" aria-describedby="basic-addon1">
                            </div>

                            <div class="row my-3 w-75" style="margin-left: 6.5vw">
                                <label class="fs-5">Prénom</label>
                                <input type="text" v-model="surname" class="form-control input-auth-app" aria-label="surname" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-5">
                            <button type="submit" class="btn btn-lg bg-green-app text-white text-center rounded" @click="updateIdentity">Enregistrer</button>
                        </div>
                    </div>
                </div>

                <div v-else-if="route === 8">
                    <div class="row my-3 w-75" style="margin-left: 6.5vw">
                        <label class="fs-5 mb-4">Mes trajets</label>

<!--                        <div style="max-width: 45vw; background-color: transparent; box-shadow: rgba(0, 0, 0, 0.04) 0px 3px 5px;" class="card mb-3" >-->
<!--                            <div style="padding: 2vh">-->
<!--                                <h5 class="card-title">{{ trip.departure_city }} - {{ trip.arrival_city }}</h5>-->
<!--                                <p class="card-text">{{ trip.description }}</p>-->
<!--                                <p class="card-text">{{ trip.departure_date }}</p>-->
<!--                            </div>-->
<!--                        </div>-->

                        <div class="p-3 m-3" v-for="trip in user.trips">
                            <trip-component
                                :trip="trip"
                                :is-filterable="true"/>
                        </div>

                    </div>
                </div>

                <div v-else-if="route === 9">
                    <div class="row my-3 w-75" style="margin-left: 6.5vw">
                        <div class="input-group mb-3">
                            <div class="row my-3 w-75">
                                <label class="fs-5" for="avatar">Ajouter ma bio</label>
                            </div>
                            <div class="form-floating row my-3 w-75">
                                <textarea v-model="bio" class="form-control" placeholder="Quelle est votre chanson préférée ?" id="floatingTextarea2" style="height: 100px"></textarea>
                                <label for="floatingTextarea2">Quelle est votre chanson préférée ?</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-5">
                            <button type="submit" class="btn btn-lg bg-green-app text-white text-center rounded" @click="updateBio">Enregistrer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: "AccountComponent",
        props: {
            user: Object,
            styleInformation: Object,
            tab: Boolean,
            route: Number
        },
        data() {
            return {
                tab: true,
                styleInformation : {
                    width: "26vw",
                    border: "none",
                    backgroundColor: "#346751",
                    height: "5px"
                },
                styleMyAccount : {
                    width: "26vw",
                },
                route: 1,
                password: "",
                regex: new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9_])"),
                statusPassword: 2,
                picture: null,
                mail: this.user.email,
                name: this.user.name,
                surname: this.user.surname,
                markCars: "",
                modelCars: "",
                colorCars: "",
                bio: this.user.bio,
            }
        },
        methods: {
            setRoute(tab) {
                if (tab == 1) {
                    this.styleInformation = {
                        width: "26vw",
                        border: "none",
                        backgroundColor: "#346751",
                        height: "7px"
                    }
                    this.styleMyAccount = {
                        width: "26vw"
                    }
                } else if (tab == 2) {
                    this.styleInformation = {
                        width: "26vw"
                    }
                    this.styleMyAccount = {
                        width: "26vw",
                        border: "none",
                        backgroundColor: "#346751",
                        height: "7px"
                    }
                }

                this.route = tab;
            },
            async sendPicture(){
                let formData = new FormData();
                formData.append('file', this.picture);
                await axios.post('/profil-picture', formData)
                location.href = '/account';
            },
            onChange(event) {
                this.picture = event.target.files[0]
            },
            async updateEmail() {
                await axios.post('/update-email', {"mail": this.mail})
                location.href = '/account';
            },
            async updateIdentity() {
                await axios.post('/update-identity', {"name": this.name, "surname": this.surname})
                location.href = '/account';
            },
            async updateBio() {
                await axios.post('/update-bio', {"bio": this.bio})
                location.href = '/account';
            },
            async updatePassword() {
                await axios.post('/update-password', {"password": this.password})
                location.href = '/account';
            }
        },
        computed: {
            comment(){
                return this.user.trips.filter(trip =>
                    trip.pivot.opinion && trip.pivot.opinion.trim() !== ""
                ).length;
            }
        },
        watch: {
            password(value) {
                if(value.trim() !== '' && !this.regex.test(value)){
                    this.statusPassword = 0
                } else if(value.trim() !== '' && this.regex.test(value)){
                    this.statusPassword = 1
                } else{
                    this.statusPassword = 2
                }
            }
        }
    }
</script>

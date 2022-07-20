<template>
    <nav class="navbar navbar-dark bg-darker-app py-3">
        <div class="d-flex justify-content-between mx-auto w-75 align-items-center">
            <a class="navbar-brand fw-bold" href="/">Eco-Voit</a>
            <ul class="navbar-nav d-flex flex-row align-items-center fw-bold">
                <li class="nav-item mx-3">
                    <div class="nav-link active d-flex align-items-center" aria-current="page">
                        <svg class="me-1" width="24" height="24" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M27 27L20.8613 20.8503L27 27ZM24.2632 12.6316C24.2632 15.7165 23.0377 18.675 20.8563 20.8563C18.675 23.0377 15.7165 24.2632 12.6316 24.2632C9.54669 24.2632 6.58816 23.0377 4.40681 20.8563C2.22547 18.675 1 15.7165 1 12.6316C1 9.54669 2.22547 6.58816 4.40681 4.40681C6.58816 2.22547 9.54669 1 12.6316 1C15.7165 1 18.675 2.22547 20.8563 4.40681C23.0377 6.58816 24.2632 9.54669 24.2632 12.6316V12.6316Z" stroke="#F8F8F8" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                        Rechercher
                    </div>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link active d-flex align-items-center" aria-current="page" href="/add-trip">
                        <svg class="me-1" width="24" height="24" viewBox="0 0 26 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13 0.296814C20.1793 0.296814 26 6.11756 26 13.2968C26 20.4761 20.1793 26.2968 13 26.2968C5.82075 26.2968 0 20.4761 0 13.2968C0 6.11756 5.82075 0.296814 13 0.296814ZM13 1.92181C6.71775 1.92181 1.625 7.01456 1.625 13.2968C1.625 19.5791 6.71775 24.6718 13 24.6718C19.2822 24.6718 24.375 19.5791 24.375 13.2968C24.375 7.01456 19.2822 1.92181 13 1.92181ZM13 6.79681C13.2155 6.79681 13.4222 6.88242 13.5745 7.03479C13.7269 7.18716 13.8125 7.39383 13.8125 7.60931V12.4843H18.6875C18.903 12.4843 19.1097 12.5699 19.262 12.7223C19.4144 12.8747 19.5 13.0813 19.5 13.2968C19.5 13.5123 19.4144 13.719 19.262 13.8713C19.1097 14.0237 18.903 14.1093 18.6875 14.1093H13.8125V18.9843C13.8125 19.1998 13.7269 19.4065 13.5745 19.5588C13.4222 19.7112 13.2155 19.7968 13 19.7968C12.7845 19.7968 12.5779 19.7112 12.4255 19.5588C12.2731 19.4065 12.1875 19.1998 12.1875 18.9843V14.1093H7.3125C7.09701 14.1093 6.89035 14.0237 6.73798 13.8713C6.5856 13.719 6.5 13.5123 6.5 13.2968C6.5 13.0813 6.5856 12.8747 6.73798 12.7223C6.89035 12.5699 7.09701 12.4843 7.3125 12.4843H12.1875V7.60931C12.1875 7.39383 12.2731 7.18716 12.4255 7.03479C12.5779 6.88242 12.7845 6.79681 13 6.79681Z" fill="white"/>
                        </svg>
                        Publier un trajet
                    </a>
                </li>
                <li class="nav-item dropdown bg-dark-app mx-3 px-3">
                    <a class="nav-link dropdown-toggle py-1" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="me-3" v-if="user">{{ user.surname }} {{ user.name }}</span>

                    </a>
                    <ul class="dropdown-menu position-absolute" aria-labelledby="navbarDropdown">
                        <div v-if="user">
                            <li><a class="dropdown-item" href="/login">Connexion</a></li>
                            <li><a class="dropdown-item" href="/register">Inscription</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item p-3 fw-bold" href="/logout">Déconnexion</a></li>
                        </div>

                        <div v-else>
                            <li><a class="dropdown-item p-3 fw-bold" href="/login">Connexion</a></li>
                            <li><a class="dropdown-item p-3 fw-bold" href="/register">Inscription</a></li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</template>

<script>
export default {
    name: "AppHeader",
    props: {
        user: Object
    }
}
</script>

<style scoped>

</style>

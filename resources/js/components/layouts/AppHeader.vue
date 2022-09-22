<template>
    <nav class="navbar navbar-dark bg-darker-app py-3">
        <div class="d-flex justify-content-between mx-auto w-75 align-items-center">
            <a class="navbar-brand fw-bold" href="/">Eco-Voit</a>
            <ul class="navbar-nav d-flex flex-row align-items-center fw-bold">
                <li class="nav-item mx-3">
                    <a class="nav-link active d-flex align-items-center" aria-current="page" href="/add-trip">
                        <svg class="me-1" width="24" height="24" viewBox="0 0 26 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13 0.296814C20.1793 0.296814 26 6.11756 26 13.2968C26 20.4761 20.1793 26.2968 13 26.2968C5.82075 26.2968 0 20.4761 0 13.2968C0 6.11756 5.82075 0.296814 13 0.296814ZM13 1.92181C6.71775 1.92181 1.625 7.01456 1.625 13.2968C1.625 19.5791 6.71775 24.6718 13 24.6718C19.2822 24.6718 24.375 19.5791 24.375 13.2968C24.375 7.01456 19.2822 1.92181 13 1.92181ZM13 6.79681C13.2155 6.79681 13.4222 6.88242 13.5745 7.03479C13.7269 7.18716 13.8125 7.39383 13.8125 7.60931V12.4843H18.6875C18.903 12.4843 19.1097 12.5699 19.262 12.7223C19.4144 12.8747 19.5 13.0813 19.5 13.2968C19.5 13.5123 19.4144 13.719 19.262 13.8713C19.1097 14.0237 18.903 14.1093 18.6875 14.1093H13.8125V18.9843C13.8125 19.1998 13.7269 19.4065 13.5745 19.5588C13.4222 19.7112 13.2155 19.7968 13 19.7968C12.7845 19.7968 12.5779 19.7112 12.4255 19.5588C12.2731 19.4065 12.1875 19.1998 12.1875 18.9843V14.1093H7.3125C7.09701 14.1093 6.89035 14.0237 6.73798 13.8713C6.5856 13.719 6.5 13.5123 6.5 13.2968C6.5 13.0813 6.5856 12.8747 6.73798 12.7223C6.89035 12.5699 7.09701 12.4843 7.3125 12.4843H12.1875V7.60931C12.1875 7.39383 12.2731 7.18716 12.4255 7.03479C12.5779 6.88242 12.7845 6.79681 13 6.79681Z" fill="white"/>
                        </svg>
                        Publier un trajet
                    </a>
                </li>
                <li class="nav-item dropdown bg-dark-app mx-3 px-3">
                    <a class="nav-link dropdown-toggle d-flex align-items-center py-1" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div v-if="user.avatar_url" class="me-1" :style="`width:50px;
                            height:50px;
                            border-radius:50%;
                            background-image: url(${user.avatar_url});
                            background-position: center;
                            background-size:100% auto;
                            background-repeat: no-repeat;`">
                        </div>

                        <svg v-else class="me-3 my-1" width="17" height="23" viewBox="0 0 17 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.49998 7.55745e-06C7.78483 -0.0170939 7.07348 0.108994 6.40778 0.370854C5.74208 0.632713 5.13546 1.02506 4.62362 1.52481C4.11178 2.02456 3.70505 2.62162 3.42735 3.28087C3.14965 3.94012 3.00659 4.64825 3.00659 5.36361C3.00659 6.07896 3.14965 6.78709 3.42735 7.44635C3.70505 8.1056 4.11178 8.70266 4.62362 9.20241C5.13546 9.70216 5.74208 10.0945 6.40778 10.3564C7.07348 10.6182 7.78483 10.7443 8.49998 10.7272C9.21513 10.7443 9.92648 10.6182 10.5922 10.3564C11.2579 10.0945 11.8645 9.70216 12.3763 9.20241C12.8882 8.70266 13.2949 8.1056 13.5726 7.44635C13.8503 6.78709 13.9934 6.07896 13.9934 5.36361C13.9934 4.64825 13.8503 3.94012 13.5726 3.28087C13.2949 2.62162 12.8882 2.02456 12.3763 1.52481C11.8645 1.02506 11.2579 0.632713 10.5922 0.370854C9.92648 0.108994 9.21513 -0.0170939 8.49998 7.55745e-06ZM5.43332 13.7908C4.00999 13.7908 2.64496 14.3562 1.63851 15.3627C0.632065 16.3691 0.0666504 17.7341 0.0666504 19.1575V22.9862H16.9333V19.1575C16.9333 17.7341 16.3679 16.3691 15.3615 15.3627C14.355 14.3562 12.99 13.7908 11.5666 13.7908H5.43332Z" fill="#CBCBCB"/>
                        </svg>

                        <span class="me-3" v-if="user">
                            {{ user.surname }} {{ user.name }}
                        </span>
                    </a>
                    <ul class="dropdown-menu position-absolute" style="width: 10vw" aria-labelledby="navbarDropdown">
                        <div v-if="user">
                            <li><a class="dropdown-item" href="/account">Mon compte</a></li>
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

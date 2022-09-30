@extends('layouts.default')

@section('content')
    <div class="d-flex flex-column justify-content-center align-items-center mt-5 py-3"
         style="min-height: 55vh; background-image: url('https://eco-voit-bucket.s3.eu-west-3.amazonaws.com/assets/home-image-3.jpg');
                                  background-repeat: no-repeat;
                                  background-size: cover;
                                  background-position: bottom;">
        <div class="d-flex flex-column align-items-center my-5">
            <h2 class="fw-bold text-white">Trouver votre prochaine destination</h2>
            <p class="text-white">Indiquer dans la barre ci-dessous votre itinéraire</p>
        </div>
        <searching-bar-component/>
    </div>
    <div class="bg-white d-flex align-items-center py-3" style="min-height: 50vh;">
        <div class="d-flex flex-column flex-lg-row mx-auto w-75">
            <div class="p-5 me-3">
                <svg class="mb-3" width="55" height="55" viewBox="0 0 55 55" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M29.51 24.15C28.17 23.815 26.83 23.145 25.825 22.14C24.82 21.805 24.485 20.8 24.485 20.13C24.485 19.46 24.8199 18.455 25.4899 18.12C26.4949 17.45 27.5 16.78 28.505 17.115C30.515 17.115 32.1899 18.12 33.1949 19.46L36.21 15.44C35.205 14.435 34.1999 13.765 33.1949 13.095C32.1899 12.425 30.85 12.09 29.51 12.09V7.4H25.4899V12.09C23.8149 12.425 22.14 13.43 20.8 14.77C19.46 16.445 18.455 18.455 18.79 20.465C18.79 22.475 19.46 24.485 20.8 25.825C22.475 27.5 24.82 28.505 26.83 29.51C27.835 29.845 29.175 30.515 30.18 31.185C30.85 31.855 31.185 32.86 31.185 33.865C31.185 34.87 30.85 35.875 30.18 36.88C29.175 37.885 27.835 38.22 26.83 38.22C25.49 38.22 23.815 37.885 22.81 36.88C21.805 36.21 20.8 35.205 20.13 34.2L16.78 37.885C17.785 39.225 18.79 40.23 20.13 41.235C21.805 42.24 23.815 43.245 25.825 43.245V47.6H29.51V42.575C31.52 42.24 33.195 41.235 34.535 39.895C36.21 38.22 37.2149 35.54 37.2149 33.195C37.2149 31.185 36.5449 28.84 34.8699 27.5C33.1949 25.825 31.52 24.82 29.51 24.15V24.15ZM27.5 0.700001C12.76 0.700001 0.699951 12.76 0.699951 27.5C0.699951 42.24 12.76 54.3 27.5 54.3C42.24 54.3 54.2999 42.24 54.2999 27.5C54.2999 12.76 42.24 0.700001 27.5 0.700001ZM27.5 50.615C14.77 50.615 4.38495 40.23 4.38495 27.5C4.38495 14.77 14.77 4.385 27.5 4.385C40.2299 4.385 50.6149 14.77 50.6149 27.5C50.6149 40.23 40.2299 50.615 27.5 50.615V50.615Z" fill="#346751"/>
                </svg>
                <p class="fs-5">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when
                </p>
            </div>
            <div class="p-5 me-3">
                <svg class="mb-3" width="55" height="55" viewBox="0 0 59 59" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M29.5 0.1875C18.7695 5.03715 11.8837 7.3141 0.1875 8.5625C0.1875 18.7159 0.877129 26.0139 3.49693 32.7074C5.63913 38.1654 8.81271 43.1597 12.8442 47.4173C19.3348 54.3083 26.4758 57.9384 29.5 58.8125C32.5242 57.9384 39.6652 54.3083 46.1558 47.4173C50.1873 43.1597 53.3609 38.1654 55.5031 32.7074C58.1229 26.0139 58.8125 18.7159 58.8125 8.5625C47.1163 7.3141 40.2305 5.03715 29.5 0.1875ZM50.6299 30.7994C48.7302 35.6338 45.9174 40.0571 42.3452 43.8278C37.3516 49.1289 32.2022 52.0484 29.5 53.2327V5.91914C34.5708 8.14375 38.494 9.62246 42.3151 10.7465C45.9864 11.8204 49.7298 12.6303 53.5166 13.1701C53.2915 21.0504 52.4226 26.2154 50.6299 30.7994Z" fill="#346751"/>
                </svg>
                <p class="fs-5">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when
                </p>
            </div>
            <div class="p-5">
                <svg class="mb-3" width="55" height="55" viewBox="0 0 45 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20.0154 62.2083C19.6917 62.208 19.3706 62.1513 19.0663 62.0408C18.4793 61.8259 17.9815 61.4202 17.6525 60.8888C17.3234 60.3573 17.1823 59.7308 17.2517 59.1096L19.4013 39.3167H2.95835C2.45119 39.3174 1.9534 39.18 1.51845 38.9192C1.0835 38.6584 0.727813 38.284 0.489596 37.8363C0.251379 37.3885 0.139632 36.8844 0.166354 36.3779C0.193076 35.8715 0.357259 35.3818 0.64127 34.9617L22.6675 2.02C23.0159 1.50449 23.5265 1.12012 24.1182 0.927927C24.71 0.735734 25.349 0.746729 25.9338 0.959168C26.4959 1.16788 26.976 1.55207 27.3028 2.05487C27.6296 2.55766 27.7858 3.15233 27.7484 3.75083L25.5988 23.6833H42.0417C42.5488 23.6826 43.0466 23.82 43.4816 24.0808C43.9165 24.3416 44.2722 24.716 44.5104 25.1637C44.7487 25.6115 44.8604 26.1156 44.8337 26.6221C44.807 27.1285 44.6428 27.6182 44.3588 28.0383L22.3325 60.98C22.0764 61.3589 21.7312 61.669 21.3272 61.8832C20.9232 62.0974 20.4727 62.209 20.0154 62.2083Z" fill="#346751"/>
                </svg>
                <p class="fs-5">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when
                </p>
            </div>
        </div>
    </div>
    <div class="bg-green-app p-3">
        <div class="d-flex flex-column mx-auto w-75 py-3 my-3">
            <div class="d-flex flex-column">
                <h3 class="text-white fw-bold mb-3">Explorer la France et ses alentours</h3>
                <h5 class="text-white fw-lighter mb-3">Ces destinations prisées ont beaucoup à offrir</h5>
            </div>
            <div class="d-flex justify-content-between mt-3 multi_trips_home">
                <div class="bg-white shadow-sm rounded fw-bold text-green-app fs-5 p-3 d-flex align-items-center justify-content-between me-3 unique_trip_home" style="width:25%; height: 50px;">
                    <div class="d-flex flex-lg-row flex-column align-items-center">
                        <span class="me-0 me-lg-3">Paris</span>
                        <svg class="d-none d-lg-block" width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M-2 4.99999C-2 4.86738 -1.94732 4.74021 -1.85355 4.64644C-1.75979 4.55267 -1.63261 4.49999 -1.5 4.49999H10.293L7.146 1.35399C7.05211 1.2601 6.99937 1.13277 6.99937 0.999991C6.99937 0.867215 7.05211 0.739877 7.146 0.645991C7.23989 0.552104 7.36722 0.499359 7.5 0.499359C7.63278 0.499359 7.76011 0.552104 7.854 0.645991L11.854 4.64599C11.9006 4.69244 11.9375 4.74761 11.9627 4.80836C11.9879 4.8691 12.0009 4.93422 12.0009 4.99999C12.0009 5.06576 11.9879 5.13088 11.9627 5.19162C11.9375 5.25237 11.9006 5.30754 11.854 5.35399L7.854 9.35399C7.76011 9.44788 7.63278 9.50062 7.5 9.50062C7.36722 9.50062 7.23989 9.44788 7.146 9.35399C7.05211 9.2601 6.99937 9.13277 6.99937 8.99999C6.99937 8.86722 7.05211 8.73988 7.146 8.64599L10.293 5.49999H-1.5C-1.63261 5.49999 -1.75979 5.44731 -1.85355 5.35354C-1.94732 5.25978 -2 5.1326 -2 4.99999Z" fill="#346751"/>
                        </svg>
                        <span class="ms-0 ms-lg-3">Lyon</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="me-3">11€</span>
                        <svg width="9" height="17" viewBox="0 0 9 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.990337 1.06206C0.875858 1.17926 0.811768 1.3366 0.811768 1.50043C0.811768 1.66427 0.875858 1.8216 0.990337 1.93881L7.38615 8.49999L0.990337 15.0599C0.875858 15.1771 0.811768 15.3344 0.811768 15.4982C0.811768 15.6621 0.875858 15.8194 0.990337 15.9366C1.04598 15.9938 1.11251 16.0392 1.186 16.0702C1.25949 16.1012 1.33845 16.1172 1.41821 16.1172C1.49798 16.1172 1.57694 16.1012 1.65042 16.0702C1.72391 16.0392 1.79044 15.9938 1.84609 15.9366L8.64746 8.95806C8.76692 8.8355 8.83377 8.67113 8.83377 8.49999C8.83377 8.32885 8.76692 8.16448 8.64746 8.04193L1.84609 1.06337C1.79044 1.00622 1.72391 0.960794 1.65042 0.929778C1.57694 0.898762 1.49798 0.882782 1.41821 0.882782C1.33845 0.882782 1.25949 0.898762 1.186 0.929778C1.11251 0.960794 1.04598 1.00622 0.990337 1.06337V1.06206Z" fill="#38584A"/>
                        </svg>
                    </div>
                </div>
                <div class="bg-white shadow-sm rounded fw-bold text-green-app fs-5 p-3 d-flex align-items-center justify-content-between me-3 unique_trip_home" style="width:25%; height: 50px;">
                    <div class="d-flex flex-lg-row flex-column align-items-center">
                        <span class="me-0 me-lg-3">Paris</span>
                        <svg class="d-none d-lg-block" width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M-2 4.99999C-2 4.86738 -1.94732 4.74021 -1.85355 4.64644C-1.75979 4.55267 -1.63261 4.49999 -1.5 4.49999H10.293L7.146 1.35399C7.05211 1.2601 6.99937 1.13277 6.99937 0.999991C6.99937 0.867215 7.05211 0.739877 7.146 0.645991C7.23989 0.552104 7.36722 0.499359 7.5 0.499359C7.63278 0.499359 7.76011 0.552104 7.854 0.645991L11.854 4.64599C11.9006 4.69244 11.9375 4.74761 11.9627 4.80836C11.9879 4.8691 12.0009 4.93422 12.0009 4.99999C12.0009 5.06576 11.9879 5.13088 11.9627 5.19162C11.9375 5.25237 11.9006 5.30754 11.854 5.35399L7.854 9.35399C7.76011 9.44788 7.63278 9.50062 7.5 9.50062C7.36722 9.50062 7.23989 9.44788 7.146 9.35399C7.05211 9.2601 6.99937 9.13277 6.99937 8.99999C6.99937 8.86722 7.05211 8.73988 7.146 8.64599L10.293 5.49999H-1.5C-1.63261 5.49999 -1.75979 5.44731 -1.85355 5.35354C-1.94732 5.25978 -2 5.1326 -2 4.99999Z" fill="#346751"/>
                        </svg>
                        <span class="ms-0 ms-lg-3">Lyon</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="me-3">11€</span>
                        <svg width="9" height="17" viewBox="0 0 9 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.990337 1.06206C0.875858 1.17926 0.811768 1.3366 0.811768 1.50043C0.811768 1.66427 0.875858 1.8216 0.990337 1.93881L7.38615 8.49999L0.990337 15.0599C0.875858 15.1771 0.811768 15.3344 0.811768 15.4982C0.811768 15.6621 0.875858 15.8194 0.990337 15.9366C1.04598 15.9938 1.11251 16.0392 1.186 16.0702C1.25949 16.1012 1.33845 16.1172 1.41821 16.1172C1.49798 16.1172 1.57694 16.1012 1.65042 16.0702C1.72391 16.0392 1.79044 15.9938 1.84609 15.9366L8.64746 8.95806C8.76692 8.8355 8.83377 8.67113 8.83377 8.49999C8.83377 8.32885 8.76692 8.16448 8.64746 8.04193L1.84609 1.06337C1.79044 1.00622 1.72391 0.960794 1.65042 0.929778C1.57694 0.898762 1.49798 0.882782 1.41821 0.882782C1.33845 0.882782 1.25949 0.898762 1.186 0.929778C1.11251 0.960794 1.04598 1.00622 0.990337 1.06337V1.06206Z" fill="#38584A"/>
                        </svg>
                    </div>
                </div>
                <div class="bg-white shadow-sm rounded fw-bold text-green-app fs-5 p-3 d-flex align-items-center justify-content-between unique_trip_home" style="width:25%; height: 50px;">
                    <div class="d-flex flex-lg-row flex-column align-items-center">
                        <span class="me-0 me-lg-3">Paris</span>
                        <svg class="d-none d-lg-block" width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M-2 4.99999C-2 4.86738 -1.94732 4.74021 -1.85355 4.64644C-1.75979 4.55267 -1.63261 4.49999 -1.5 4.49999H10.293L7.146 1.35399C7.05211 1.2601 6.99937 1.13277 6.99937 0.999991C6.99937 0.867215 7.05211 0.739877 7.146 0.645991C7.23989 0.552104 7.36722 0.499359 7.5 0.499359C7.63278 0.499359 7.76011 0.552104 7.854 0.645991L11.854 4.64599C11.9006 4.69244 11.9375 4.74761 11.9627 4.80836C11.9879 4.8691 12.0009 4.93422 12.0009 4.99999C12.0009 5.06576 11.9879 5.13088 11.9627 5.19162C11.9375 5.25237 11.9006 5.30754 11.854 5.35399L7.854 9.35399C7.76011 9.44788 7.63278 9.50062 7.5 9.50062C7.36722 9.50062 7.23989 9.44788 7.146 9.35399C7.05211 9.2601 6.99937 9.13277 6.99937 8.99999C6.99937 8.86722 7.05211 8.73988 7.146 8.64599L10.293 5.49999H-1.5C-1.63261 5.49999 -1.75979 5.44731 -1.85355 5.35354C-1.94732 5.25978 -2 5.1326 -2 4.99999Z" fill="#346751"/>
                        </svg>
                        <span class="ms-0 ms-lg-3">Lyon</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="me-3">11€</span>
                        <svg width="9" height="17" viewBox="0 0 9 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.990337 1.06206C0.875858 1.17926 0.811768 1.3366 0.811768 1.50043C0.811768 1.66427 0.875858 1.8216 0.990337 1.93881L7.38615 8.49999L0.990337 15.0599C0.875858 15.1771 0.811768 15.3344 0.811768 15.4982C0.811768 15.6621 0.875858 15.8194 0.990337 15.9366C1.04598 15.9938 1.11251 16.0392 1.186 16.0702C1.25949 16.1012 1.33845 16.1172 1.41821 16.1172C1.49798 16.1172 1.57694 16.1012 1.65042 16.0702C1.72391 16.0392 1.79044 15.9938 1.84609 15.9366L8.64746 8.95806C8.76692 8.8355 8.83377 8.67113 8.83377 8.49999C8.83377 8.32885 8.76692 8.16448 8.64746 8.04193L1.84609 1.06337C1.79044 1.00622 1.72391 0.960794 1.65042 0.929778C1.57694 0.898762 1.49798 0.882782 1.41821 0.882782C1.33845 0.882782 1.25949 0.898762 1.186 0.929778C1.11251 0.960794 1.04598 1.00622 0.990337 1.06337V1.06206Z" fill="#38584A"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white d-flex align-items-center py-3" style="min-height: 75vh;">
        <div class="d-flex flex-column flex-lg-row justify-content-evenly align-items-center mx-auto fs-5 w-100">
            <div class="w-50 d-flex justify-content-center align-items-center m-3">
                <img class="img_home" src="https://eco-voit-bucket.s3.eu-west-3.amazonaws.com/assets/home-image-1.png" />
            </div>
            <div class="w-75 m-3">
                <h3 class="fw-bold mb-3">Faites des économies sur votre plein !</h3>
                <p class="py-3">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the
                </p>
                <p class="py-3">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry
                    industry's standard dummy text ever since the industry industry's standard
                    dummy text ever since the
                </p>
                <a class="btn btn-lg bg-green-app text-white text-center fw-bold rounded shadow-lg" href="#" style="width: 250px;">
                    Publier un trajet
                </a>
            </div>
        </div>
    </div>
    <div class="p-3 mt-4" class="picture_ext_home" style="background-image: url('https://eco-voit-bucket.s3.eu-west-3.amazonaws.com/assets/home-image-2.png');
                                                     background-position: bottom;
                                                     background-size: 120%;
                                                     background-repeat: no-repeat
    ">
        <div class="d-flex flex-column w-75 mx-auto py-3 my-3">
            <div class="d-flex flex-column">
                <h3 class="fw-bold mb-3">Faites des économies sur votre plein !</h3>
                <h5 class="fw-lighter mb-3">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the
                </h5>
            </div>
            <a class="btn btn-lg bg-green-app text-white text-center fw-bold rounded shadow-lg mt-3" href="#" style="width: 250px;">
                Découvrir
            </a>
        </div>
    </div>
    <div class="bg-white d-flex align-items-center py-3" style="min-height: 60vh;">
        <div class="d-flex flex-column flex-lg-row justify-content-center mx-auto fs-5 w-75">
            <div class="p-5 me-3">
                <svg class="mb-3" width="59" height="59" viewBox="0 0 59 59" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M58.8125 58.8125H54.625V48.3438C54.6217 45.5683 53.5177 42.9074 51.5551 40.9449C49.5926 38.9823 46.9317 37.8783 44.1562 37.875V33.6875C48.042 33.6919 51.7673 35.2375 54.5149 37.9851C57.2625 40.7327 58.8081 44.458 58.8125 48.3438V58.8125ZM42.0625 58.8125H37.875V48.3438C37.8717 45.5683 36.7677 42.9074 34.8051 40.9449C32.8426 38.9823 30.1817 37.8783 27.4062 37.875H14.8438C12.0683 37.8783 9.40745 38.9823 7.4449 40.9449C5.48235 42.9074 4.37832 45.5683 4.375 48.3438V58.8125H0.1875V48.3438C0.191933 44.458 1.73749 40.7327 4.48511 37.9851C7.23273 35.2375 10.958 33.6919 14.8438 33.6875H27.4062C31.292 33.6919 35.0173 35.2375 37.7649 37.9851C40.5125 40.7327 42.0581 44.458 42.0625 48.3438V58.8125ZM37.875 0.1875V4.375C40.6515 4.375 43.3143 5.47795 45.2775 7.44123C47.2408 9.4045 48.3438 12.0673 48.3438 14.8438C48.3438 17.6202 47.2408 20.283 45.2775 22.2463C43.3143 24.2095 40.6515 25.3125 37.875 25.3125V29.5C41.7621 29.5 45.49 27.9559 48.2385 25.2073C50.9871 22.4587 52.5312 18.7308 52.5312 14.8438C52.5312 10.9567 50.9871 7.2288 48.2385 4.48022C45.49 1.73164 41.7621 0.1875 37.875 0.1875ZM21.125 4.375C23.1955 4.375 25.2195 4.98898 26.9411 6.1393C28.6627 7.28962 30.0045 8.92462 30.7969 10.8375C31.5892 12.7504 31.7965 14.8554 31.3926 16.8861C30.9887 18.9168 29.9916 20.7822 28.5275 22.2463C27.0634 23.7104 25.1981 24.7074 23.1674 25.1113C21.1366 25.5153 19.0317 25.308 17.1188 24.5156C15.2059 23.7233 13.5709 22.3815 12.4206 20.6599C11.2702 18.9383 10.6562 16.9143 10.6562 14.8438C10.6562 12.0673 11.7592 9.4045 13.7225 7.44123C15.6857 5.47795 18.3485 4.375 21.125 4.375ZM21.125 0.1875C18.2263 0.1875 15.3926 1.04707 12.9824 2.65752C10.5722 4.26797 8.69369 6.55697 7.58439 9.23505C6.47509 11.9131 6.18485 14.86 6.75037 17.703C7.31588 20.5461 8.71175 23.1576 10.7615 25.2073C12.8112 27.257 15.4227 28.6529 18.2657 29.2184C21.1087 29.7839 24.0556 29.4937 26.7337 28.3844C29.4118 27.2751 31.7008 25.3965 33.3112 22.9863C34.9217 20.5761 35.7812 17.7425 35.7812 14.8438C35.7812 10.9567 34.2371 7.2288 31.4885 4.48022C28.74 1.73164 25.0121 0.1875 21.125 0.1875Z" fill="#346751"/>
                </svg>
                <h3 class="fw-bold my-3">À propos</h3>
                <p class="fs-5 mt-3">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                </p>
                <a href="#" class="text-black fs-5">
                    En savoir plus
                </a>
            </div>
            <div class="p-5 me-3">
                <svg class="mb-3" width="59" height="59" viewBox="0 0 51 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M42.5 0H8.5C6.24566 0 4.08365 0.829685 2.48959 2.30653C0.895533 3.78338 0 5.78642 0 7.875V55.125C0 57.2136 0.895533 59.2166 2.48959 60.6935C4.08365 62.1703 6.24566 63 8.5 63H42.5C44.7543 63 46.9163 62.1703 48.5104 60.6935C50.1045 59.2166 51 57.2136 51 55.125V7.875C51 5.78642 50.1045 3.78338 48.5104 2.30653C46.9163 0.829685 44.7543 0 42.5 0ZM12.75 15.75H38.25C38.8136 15.75 39.3541 15.9574 39.7526 16.3266C40.1511 16.6958 40.375 17.1966 40.375 17.7188C40.375 18.2409 40.1511 18.7417 39.7526 19.1109C39.3541 19.4801 38.8136 19.6875 38.25 19.6875H12.75C12.1864 19.6875 11.6459 19.4801 11.2474 19.1109C10.8489 18.7417 10.625 18.2409 10.625 17.7188C10.625 17.1966 10.8489 16.6958 11.2474 16.3266C11.6459 15.9574 12.1864 15.75 12.75 15.75ZM10.625 25.5938C10.625 25.0716 10.8489 24.5708 11.2474 24.2016C11.6459 23.8324 12.1864 23.625 12.75 23.625H38.25C38.8136 23.625 39.3541 23.8324 39.7526 24.2016C40.1511 24.5708 40.375 25.0716 40.375 25.5938C40.375 26.1159 40.1511 26.6167 39.7526 26.9859C39.3541 27.3551 38.8136 27.5625 38.25 27.5625H12.75C12.1864 27.5625 11.6459 27.3551 11.2474 26.9859C10.8489 26.6167 10.625 26.1159 10.625 25.5938ZM12.75 31.5H38.25C38.8136 31.5 39.3541 31.7074 39.7526 32.0766C40.1511 32.4458 40.375 32.9466 40.375 33.4688C40.375 33.9909 40.1511 34.4917 39.7526 34.8609C39.3541 35.2301 38.8136 35.4375 38.25 35.4375H12.75C12.1864 35.4375 11.6459 35.2301 11.2474 34.8609C10.8489 34.4917 10.625 33.9909 10.625 33.4688C10.625 32.9466 10.8489 32.4458 11.2474 32.0766C11.6459 31.7074 12.1864 31.5 12.75 31.5ZM12.75 39.375H25.5C26.0636 39.375 26.6041 39.5824 27.0026 39.9516C27.4011 40.3208 27.625 40.8216 27.625 41.3438C27.625 41.8659 27.4011 42.3667 27.0026 42.7359C26.6041 43.1051 26.0636 43.3125 25.5 43.3125H12.75C12.1864 43.3125 11.6459 43.1051 11.2474 42.7359C10.8489 42.3667 10.625 41.8659 10.625 41.3438C10.625 40.8216 10.8489 40.3208 11.2474 39.9516C11.6459 39.5824 12.1864 39.375 12.75 39.375Z" fill="#346751"/>
                </svg>
                <h3 class="fw-bold my-3">Espace Presse</h3>
                <p class="fs-5 mt-3">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                </p>
                <a href="#" class="text-black fs-5">
                    En savoir plus
                </a>
            </div>
            <div class="p-5">
                <svg class="mb-3" width="59" height="59" viewBox="0 0 57 67" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.8125 37.2222H39.1875V59.5556H49.875V26.0556L28.5 9.30556L7.125 26.0556V59.5556H17.8125V37.2222ZM0 67V22.3333L28.5 0L57 22.3333V67H0Z" fill="#346751"/>
                </svg>
                <h3 class="fw-bold my-3">Citoyens du monde</h3>
                <p class="fs-5 mt-3">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                </p>
                <a href="#" class="text-black fs-5">
                    En savoir plus
                </a>
            </div>
        </div>
    </div>
@endsection
<script>
    import SearchingBarComponent from "../js/components/tools/SearchingBarComponent";
    export default {
        components: {SearchingBarComponent}
    }
</script>

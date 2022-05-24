<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link type="text/tailwindcss" href="{{ asset('css/customTailwind.css') }}" rel="stylesheet">
    <title>{{ $title }}</title>
</head>
<style>
    @media only screen and (max-width: 480px) {

        html,
        body {
            max-width: 100vw;
            overflow-x: hidden;
            border-bottom: none !important;
            border-style: hidden !important;
            border: none !important;
            outline: none !important;
            border-collapse: collapse !important;
        }
    }

</style>
<body>
    <!-- Navbar -->
    <section class="h-full w-full border-box transition-all duration-500 linear lg:px-24 md:px-20 px-8 py-3 bg-blue-800 navbar navbar-fixed-top">
        <style>
            @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

            .navbar-1-1 .btn-fill {
                background-color: #0ec8f8;
                transition: 0.3s;
            }

            .navbar-1-1 .btn-fill:hover {
                background-color: #3ad8ff;
                transition: 0.3s;
            }

            .navbar-1-1 nav a.nav-link {
                color: #092a33;
                transition: 0.3s;
            }

            .navbar-1-1 nav a.nav-link:hover {
                color: #2c3b3f;
                font-weight: 500;
                transition: 0.3s;
            }

            .navbar-1-1 nav a.nav-link.active {
                color: #2c3b3f;
            }

            .navbar-1-1 #menu-toggle:checked+#menu,
            .navbar-1-1 #menu-toggle:checked+#menu+#menu {
                display: block;
            }

            @media only screen and (max-width: 480px) {

                .menu-burger {
                    margin-left: 220px !important;
                    margin-right: 0px !important;
                }

                .navbar-fixed-top {
                    height: fit-content;
                    margin-top: 0px !important;
                    position: fixed;
                    z-index: 50;
                }

            }

            @media only screen and (min-width: 992px) {
                .navbar {
                    position: fixed !important;
                    height: 3rem !important;
                    z-index: 40;
                }

                .navbar-1-1 {
                    position: fixed !important;
                    right: 0px;
                }

                .navbar-1-1 .logo-navbar {
                    position: fixed !important;
                    left: 0px;
                }

            }

        </style>
        <!-- dropdown 2-->
        <style>
            .dropbtn {
                background-color: #61C7ff;
                color: white;
                padding: 16px;
                font-size: 16px;
                border: none;
            }

            .dropdown {
                position: relative;
                display: inline-block;
            }

            .dropdown-content {
                display: none;
                position: absolute;
                background-color: #f1f1f1;
                min-width: 160px;
                box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
                z-index: 1;
            }

            .dropdown-content a {
                color: black;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
            }

            .dropdown-content a:hover {
                background-color: #ddd;
            }

            .dropdown:hover .dropdown-content {
                display: block;
            }

            .dropdown:hover .dropbtn {
                background-color: #9db6c4;
            }

            @media only screen and (max-width: 480px) {
                .dropdown-menu-mobile {
                    margin-top: -300px !important;
                    margin-left: 150px !important;
                }
            }

        </style>
        <div class="navbar-1-1" style="font-family: 'Poppins', sans-serif">
            <div class="container mx-auto flex flex-wrap flex-row items-center justify-between">
                <a href="" class="flex font-medium items-center logo-navbar">
                    <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3.5 15.75C3.5 8.98451 8.98451 3.5 15.75 3.5H29.75C30.7165 3.5 31.5 4.2835 31.5 5.25C31.5 6.2165 30.7165 7 29.75 7H15.75C10.9175 7 7 10.9175 7 15.75V29.75C7 30.7165 6.2165 31.5 5.25 31.5C4.2835 31.5 3.5 30.7165 3.5 29.75V15.75Z" fill="#0EC8F8" />
                        <path d="M10.5 17.5C10.5 13.634 13.634 10.5 17.5 10.5H31.5C35.366 10.5 38.5 13.634 38.5 17.5V31.5C38.5 35.366 35.366 38.5 31.5 38.5H17.5C13.634 38.5 10.5 35.366 10.5 31.5V17.5Z" fill="#0EC8F8" />
                    </svg>
                </a>
                <label for="menu-toggle" class="mx-auto cursor-pointer lg:hidden block">
                    <svg class="w-6 h-6 menu-burger" fill="none" stroke="#092A33" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </label>
                <input class="hidden" type="checkbox" id="menu-toggle" />
                <div class="hidden lg:flex lg:items-center lg:w-auto w-full lg:ml-auto lg:mr-auto flex-wrap items-center text-base justify-center" id="menu">
                    <nav class="lg:space-x-12 space-x-0 lg:flex items-center justify-between text-base pt-8 lg:pt-0 lg:space-y-0 space-y-6">
                        <a href="" class="block nav-link active font-medium text-white">Home</a>
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Tentang
                        </a>
                        <ul class="dropdown-menu dropdown-menu-mobile" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Profil/Sejarah/Visi</a></li>
                            <li><a class="dropdown-item" href="#">Anggaran Dasar</a></li>
                            <li><a class="dropdown-item" href="#">Anggaran Rumah Tangga</a></li>
                            <li><a class="dropdown-item" href="#">Peraturan Organisasi</a></li>
                            <li><a class="dropdown-item" href="#">DPD Sumut</a></li>
                            <li>
                                <div class="dropdown">
                                    <button class="dropbtn">DPC Se-Sumut</button>
                                    <div class="dropdown-content">
                                        <a href="#">Link 1</a>
                                        <a href="#">Link 2</a>
                                        <a href="#">Link 3</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <a href="" class="block nav-link text-white">Program</a>
                        <a href="" class="block nav-link text-white">Berita</a>
                        <a href="" class="block nav-link text-white">Donasi</a>
                    </nav>
                </div>

                <div class="hidden lg:flex lg:items-center lg:w-auto w-full" id="menu">
                    <button class="btn-fill text-white items-center border-0 py-1 px-7 focus:outline-none rounded-2xl font-medium text-base mt-6 lg:mt-0" onClick="window.open('{{ route('register') }}','_blank')">
                        Daftar/Login
                    </button>
                </div>
            </div>
        </div>
    </section>

    @yield('menuContent')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <!-- Scroll Up ketika tombol FAQ's ditekan-->
    <script>
        var accordionItems = document.querySelectorAll('#accordion');
        accordionItems.forEach(item => {
            item.addEventListener('click', (e) => {
                setTimeout(function() {
                    let top = e.target.getBoundingClientRect().top + document.documentElement.scrollTop;
                    window.scroll({
                        top: top - 100
                        , behavior: 'smooth'
                    });
                }, 200);
            });
        });
        // Scroll Up ketika tombol FAQ page ditekan

        var faq = document.getElementsByClassName("faq-page");
        var i;

        for (i = 0; i < faq.length; i++) {
            faq[i].addEventListener("click", function() {
                /* Toggle between adding and removing the "active" class,
                to highlight the button that controls the panel */
                this.classList.toggle("active");

                /* Toggle between hiding and showing the active panel */
                var body = this.nextElementSibling;
                if (body.style.display === "block") {
                    body.style.display = "none";
                    console.log('klik kurang');
                } else {
                    console.log('klik tambah');
                    body.style.display = "block";
                }
            });
        }

        // carousel ketika layar mobile
        let lebarPonsel = window.innerWidth;
        let myCarousel = document.getElementById('myCarousel')
        if (lebarPonsel <= 480) {
                    accordionItems.forEach(item => {
            item.addEventListener('click', (e) => {
                setTimeout(function() {
                    let top = e.target.getBoundingClientRect().top + document.documentElement.scrollTop;
                    window.scroll({
                        top: top - 5
                        , behavior: 'smooth'
                    });
                }, 200);
            });
        });
        }

    </script>
</body>
</html>

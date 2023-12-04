<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PinkHeaven</title>
    <link rel="stylesheet" type="text/css" href="../dist/output.css">
    <!--<link rel="stylesheet" href="style.css">-->
    <!--LoginScript-->
    <script type="text/javascript"
            src="js/login.js"></script>
</head>

<body>
<!-- Hlavička stránky -->
<nav class="fixed top-0 z-40 flex w-full flex-row justify-end bg-pink-300 px-4 sm:justify-between" id="navBarTop">
    <div class="flex w-full flex-wrap items-center justify-between px-3">
        <button id="btnSidebarToggler" type="button" class="py-4 text-2xl text-pink-900 hover:text-pink-400">
            <svg id="navClosed" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="h-8 w-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <svg id="navOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="hidden h-8 w-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <!--HlavickaTitle -->
        <a class="hidden ml-2 text-xl text-pink-900 italic sm:block" href="index.php">PinkHeaven</a>
        <!--Search Bar -->
        <div class="flex ml-5 w-1/2 items-center justify-between" id="searchBarTop">
            <input
                    type="search"
                    class="relative m-0 block w-[1px] min-w-0 flex-auto rounded border border-solid border-pink-700 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-pink-900 outline-none transition duration-200 ease-in-out focus:z-[3] focus:text-pink-700 focus:shadow-[inset_0_0_0_1px_rgb(236,72,153)] focus:outline-none motion-reduce:transition-none placeholder:text-pink-500"
                    placeholder="Search"
                    aria-label="Search"
                    aria-describedby="button-addon2" />
            <span
                    class="input-group-text flex items-center whitespace-nowrap rounded px-3 py-1.5 text-center text-base font-normal text-pink-900"
                    id="basic-addon2">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                    class="h-5 w-5">
                <path
                  fill-rule="evenodd"
                  d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                  clip-rule="evenodd" />
                </svg>
        </span>
        </div>
        <!--Ikony -->
        <div class="flex items-center">
            <span class="flex items-center py-1.5 text-pink-900 dark:text-pink-900">
                <button class="py-1 pl-1 pr-1" id="userButton" aria-expanded="true" aria-haspopup="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </button>
                <button class="py-1 pl-1 pr-1" id="shopButton">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="10" cy="20.5" r="1"/><circle cx="18" cy="20.5" r="1"/>
                        <path d="M2.5 2.5h3l2.7 12.4a2 2 0 0 0 2 1.6h7.7a2 2 0 0 0 2-1.6l1.6-8.4H7.1"/>
                    </svg>
                </button>
            </span>
        </div>
    </div>
    <!-- Dropdown menu -->
    <!--
    Dropdown menu, show/hide based on menu state.

    Entering: "transition ease-out duration-100"
      From: "transform opacity-0 scale-95"
      To: "transform opacity-100 scale-100"
    Leaving: "transition ease-in duration-75"
      From: "transform opacity-100 scale-100"
      To: "transform opacity-0 scale-95"
  -->
    <div id="userDropdownMenu" class="absolute right-0 mr-2 z-10 mt-12 w-56 divide-y divide-pink-300 rounded-md bg-pink-200 shadow-lg ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="userButton" tabindex="-1">
            <?php
            echo '<div class="py-1" role="none">';
            echo '<h1 class="text-pink-950 block px-4 py-2" id="profileName">';
            if (isset($_SESSION['prihlaseny']))
            {
                if ($_SESSION['admin'] == 1) {
                    echo 'ADMIN: ';
                }
                if (isset($_SESSION['krstneMeno']) && isset($_SESSION['priezvisko'])) {
                    echo $_SESSION['krstneMeno'] . " " . $_SESSION['priezvisko'];
                } else {
                    echo $_SESSION['pouzivatelskeMeno'];
                }
                echo '</h1>';
                echo '<a href="roles/toggleAdmin.php" class="text-pink-900 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">';
                if ($_SESSION['admin'] == 1) {
                    echo 'Prepnúť sa na používateľa';
                } else {
                    echo 'Prepnúť sa na administrátora';
                }
                echo '</a>';
                echo '</div>';
                //Vytvorenie a vymazanie pouzivatela test
                if ($_SESSION['admin'] == 1) {
                    echo '<div class="py-1" role="none">';
                    echo '<h1 class="bg-pink-500">Pridanie pouzivatela</h1>';
                    echo '<form action="users/createUser.php" method="post">';
                    echo '<input type="text" name="pouzivatelskeMeno" placeholder="Prihlasovacie meno">';
                    echo '<input type="password" name="heslo" placeholder="Heslo">';
                    echo '<input type="email" name="email" placeholder="Email">';
                    echo '<button type="submit">Vytvorit</button>';
                    echo '</form>';
                    echo '<h1 class="bg-pink-500">Odstranenie pouzivatela</h1>';
                    echo '<form action="users/deleteUser.php" method="post">';
                    echo '<input type="text" name="pouzivatelskeMeno" placeholder="Prihlasovacie meno">';
                    echo '<button type="submit">Odstranit</button>';
                    echo '</form>';
                    echo '</div>';
                }
            }
            else {
                echo 'Nie ste prihlasený.</h1>';
                echo '</div>';
            }
            ?>

        <div class="py-1" role="none">
            <?php
                if (isset($_SESSION['prihlaseny'])) {
                    echo '<a href="login/logout.php" class="text-pink-900 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-2">Odhlásiť sa</a>';
                } else {
                    //echo '
                    //    <form action="login/check_login.php" method="post" id="testLoginForm">
                    //        <input type="hidden" name="pouzivatelskeMeno" value="m.gmitterova">
                    //        <input type="hidden" name="heslo" value="afssfa">
                    //        <button href="#" class="text-pink-900 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="prihlasitSa">Prihlásiť sa</a>
                    //    </form>
                    //    ';
                    echo '<a href="#" class="text-pink-900 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="prihlasitSa">Prihlásiť sa</a>';
                }
            ?>
        </div>
    </div>
</nav>
<!-- Koniec hlavičky -->
<!-- Sidebar štart-->
<div id="containerSidebar" class="z-10">
    <div class="navbar-menu relative z-10">
        <nav id="sidebar"
             class="fixed left-0 top-16 flex w-3/4 -translate-x-full flex-col overflow-y-auto bg-pink-200 pt-6 pb-8 sm:max-w-xs lg:w-80">
            <div class="px-4">
                <h3 class="mb-2 text-xs font-bold uppercase text-pink-950">
                    Muži
                </h3>
                <ul class="mb-8 text-sm font-medium">
                    <li>
                        <!--pridať do aktívnej triedu "active"-->
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-pink-800 hover:bg-gray-600"
                           href="#homepage">
                            <span class="select-none">Bundy</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-pink-800 hover:bg-pink-300"
                           href="#link1">
                            <span class="select-none">Tričká</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-pink-800 hover:bg-pink-300"
                           href="#link1">
                            <span class="select-none">Nohavice</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-pink-800 hover:bg-pink-300"
                           href="#link1">
                            <span class="select-none">Topánky</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="px-4">
                <h3 class="mb-2 text-xs font-bold uppercase text-pink-950">
                    Ženy
                </h3>
                <ul class="mb-8 text-sm font-medium">
                    <li>
                        <!--pridať do aktívnej triedu "active"-->
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-pink-800 hover:bg-gray-600"
                           href="#homepage">
                            <span class="select-none">Bundy</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-pink-800 hover:bg-pink-300"
                           href="#link1">
                            <span class="select-none">Tričká</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-pink-800 hover:bg-pink-300"
                           href="#link1">
                            <span class="select-none">Nohavice</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-pink-800 hover:bg-pink-300"
                           href="#link1">
                            <span class="select-none">Topánky</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="px-4">
                <h3 class="mb-2 text-xs font-bold uppercase text-pink-950">
                    Deti
                </h3>
                <ul class="mb-8 text-sm font-medium">
                    <li>
                        <!--pridať do aktívnej triedu "active"-->
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-pink-800 hover:bg-gray-600"
                           href="#homepage">
                            <span class="select-none">Bundy</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-pink-800 hover:bg-pink-300"
                           href="#link1">
                            <span class="select-none">Tričká</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-pink-800 hover:bg-pink-300"
                           href="#link1">
                            <span class="select-none">Nohavice</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-pink-800 hover:bg-pink-300"
                           href="#link1">
                            <span class="select-none">Topánky</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Este sa to asi pouzije
            <div class="px-4 pb-6">
                <h3 class="mb-2 text-xs font-bold uppercase text-pink-950">
                    Legal
                </h3>
                <ul class="mb-8 text-sm font-medium">
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-pink-800 hover:bg-pink-300"
                           href="#tc">
                            <span class="select-none">Terms and Condition</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-pink-800 hover:bg-pink-300"
                           href="#privacy">
                            <span class="select-none">Privacy policy</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-pink-800 hover:bg-pink-300"
                           href="#imprint">
                            <span class="select-none">Imprint</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="px-4 pb-6">
                <h3 class="mb-2 text-xs font-bold uppercase text-pink-950">
                    Others
                </h3>
                <ul class="mb-8 text-sm font-medium">
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-pink-800 hover:bg-pink-300"
                           href="#ex1">
                            <span class="select-none">...</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-pink-800 hover:bg-pink-300"
                           href="#ex2">
                            <span class="select-none">...</span>
                        </a>
                    </li>
                </ul>
            </div>
            -->
        </nav>
    </div>
    <div class="mx-auto lg:ml-80"></div>
</div>
<!-- Sidebar end -->
<!-- Carousel start -->
<div
        id="carouselExampleCrossfade"
        class="relative top-16"
        data-te-carousel-init
        data-te-ride="carousel">
    <!--Carousel indicators-->
    <div
            class="absolute inset-x-0 bottom-0 z-[2] mx-[15%] mb-4 flex list-none justify-center p-0"
            data-te-carousel-indicators>
        <button
                type="button"
                data-te-target="#carouselExampleCrossfade"
                data-te-slide-to="0"
                data-te-carousel-active
                class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
                aria-current="true"
                aria-label="Slide 1"></button>
        <button
                type="button"
                data-te-target="#carouselExampleCrossfade"
                data-te-slide-to="1"
                class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
                aria-label="Slide 2"></button>
        <button
                type="button"
                data-te-target="#carouselExampleCrossfade"
                data-te-slide-to="2"
                class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
                aria-label="Slide 3"></button>
    </div>

    <!--Carousel items-->
    <div
            class="relative w-full overflow-hidden after:clear-both after:block after:content-['']">
        <!--First item-->
        <div
                class="relative float-left -mr-[100%] w-full !transform-none opacity-0 transition-opacity duration-[600ms] ease-in-out motion-reduce:transition-none"
                data-te-carousel-fade
                data-te-carousel-item
                data-te-carousel-active>
            <img
                    src="https://mdbcdn.b-cdn.net/img/new/slides/041.webp"
                    class="block w-full"
                    alt="Wild Landscape" />
        </div>
        <!--Second item-->
        <div
                class="relative float-left -mr-[100%] hidden w-full !transform-none opacity-0 transition-opacity duration-[600ms] ease-in-out motion-reduce:transition-none"
                data-te-carousel-fade
                data-te-carousel-item>
            <img
                    src="https://mdbcdn.b-cdn.net/img/new/slides/042.webp"
                    class="block w-full"
                    alt="Camera" />
        </div>
        <!--Third item-->
        <div
                class="relative float-left -mr-[100%] hidden w-full !transform-none opacity-0 transition-opacity duration-[600ms] ease-in-out motion-reduce:transition-none"
                data-te-carousel-fade
                data-te-carousel-item>
            <img
                    src="https://mdbcdn.b-cdn.net/img/new/slides/043.webp"
                    class="block w-full"
                    alt="Exotic Fruits" />
        </div>
    </div>

    <!--Carousel controls - prev item-->
    <button
            class="absolute bottom-0 left-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-white opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-white hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none"
            type="button"
            data-te-target="#carouselExampleCrossfade"
            data-te-slide="prev">
    <span class="inline-block h-8 w-8">
      <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              class="h-6 w-6">
        <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M15.75 19.5L8.25 12l7.5-7.5" />
      </svg>
    </span>
        <span
                class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]"
        >Previous</span
        >
    </button>
    <!--Carousel controls - next item-->
    <button
            class="absolute bottom-0 right-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-white opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-white hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none"
            type="button"
            data-te-target="#carouselExampleCrossfade"
            data-te-slide="next">
    <span class="inline-block h-8 w-8">
      <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              class="h-6 w-6">
        <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M8.25 4.5l7.5 7.5-7.5 7.5" />
      </svg>
    </span>
        <span class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">
            Next
        </span>
    </button>
</div>
<!-- Carousel end -->
<!-- Kategorie hlavicka -->
<div class="relative flex w-full mt-16">
    <h1 class="mr-auto ml-auto text-xl font-bold text-pink-900 py-2">- KATEGÓRIE -</h1>
</div>
<!-- Pohlavie kategorie štart -->
<div class="grid md:grid-cols-3 gap-x-8 gap-y-8 items-center w-full">
    <div class="group transition duration-500 w-full relative flex" id="pohlavieKategoriaMuzi">
        <div class="absolute bg-opacity-0 group-hover:bg-opacity-60 inset-0 w-full h-full bg-white"></div>
        <div class="flex relative w-full h-[300px]">
            <h1 class="hidden group-hover:block m-auto transition duration-500 text-3xl text-pink-900">MUŽI</h1>
            <a href="kategorie.php" class="vyplnitDiv"></a>
        </div>
    </div>
    <div class="group group-hover:bg-opacity-40 transition duration-500 w-full relative flex" id="pohlavieKategoriaZeny">
        <div class="absolute bg-opacity-0 group-hover:bg-opacity-60 inset-0 w-full h-full bg-white"></div>
        <div class="flex relative w-full h-[300px]">
            <h1 class="hidden group-hover:block m-auto transition duration-500 text-3xl text-pink-900">ŽENY</h1>
            <a href="kategorie.php" class="vyplnitDiv"></a>
        </div>
    </div>
    <div class="group group-hover:bg-opacity-40 transition duration-500 w-full relative flex" id="pohlavieKategoriaDeti">
        <div class="absolute bg-opacity-0 group-hover:bg-opacity-60 inset-0 w-full h-full bg-white"></div>
        <div class="flex relative w-full h-[300px]">
            <h1 class="hidden group-hover:block m-auto transition duration-500 text-3xl text-pink-900">DETI</h1>
            <a href="kategorie.php" class="vyplnitDiv"></a>
        </div>
    </div>
</div>
<!--
<div class="grid md:grid-cols-3 gap-x-8 gap-y-8 items-center">
    <div class="group group-hover:bg-opacity-60 transition duration-500 relative flex justify-center items-center">
        <img class="group-hover:opacity-60 p-[auto] w-full h-full transition duration-500" src="https://images.pexels.com/photos/842811/pexels-photo-842811.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="Muži" />
        <div class="hidden group-hover:flex absolute top-1/2 left-1/2 justify-center items-center flex-col space-y-2">
            <p class="group-hover:opacity-60 transition duration-500 text-xl leading-5 text-pink-900">Muži</p>
        </div>
    </div>
    <div class="group group-hover:bg-opacity-60 transition duration-500 relative flex justify-center items-center kategoriaMuzi">
        <img class="group-hover:opacity-60 transition duration-500" src="https://images.pexels.com/photos/842811/pexels-photo-842811.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="Muži" />
        <div class="absolute sm:top-8 top-4 left-4 sm:left-8 flex justify-center items-center flex-col space-y-2">
            <div class="items-center">
                <p class="group-hover:opacity-60 transition duration-500 text-xl leading-5 text-gray-600 dark:text-white">Muži</p>
            </div>
        </div>
    </div>
    <div class="group group-hover:bg-opacity-60 transition duration-500 relative flex justify-center items-center kategoriaMuzi">
        <img class="group-hover:opacity-60 transition duration-500" src="https://images.pexels.com/photos/842811/pexels-photo-842811.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="Muži" />
        <div class="absolute sm:top-8 top-4 left-4 sm:left-8 flex justify-center items-center flex-col space-y-2">
            <div class="items-center">
                <p class="group-hover:opacity-60 transition duration-500 text-xl leading-5 text-gray-600 dark:text-white">Muži</p>
            </div>
        </div>
    </div>
    -->
<!--
    <div class="group group-hover:bg-opacity-60 transition duration-500 relative bg-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 sm:p-28 py-36 px-10 flex justify-center items-center">
        <img class="group-hover:opacity-60 transition duration-500" src="https://i.ibb.co/3BbZvtQ/pexels-andrea-piacquadio-3757055-removebg-preview-1.png" alt="sofa-3" />
        <div class="absolute sm:top-8 top-4 left-4 sm:left-8 flex justify-start items-start flex-col space-y-2">
            <div>
                <p class="group-hover:opacity-60 transition duration-500 text-xl leading-5 text-gray-600 dark:text-white">Two Seater Sofa</p>
            </div>
            <div>
                <p class="group-hover:opacity-60 transition duration-500 text-xl font-semibold leading-5 text-gray-800 dark:text-white">$2900</p>
            </div>
        </div>
        <div class="group-hover:opacity-60 transition duration-500 absolute bottom-8 right-8 flex justify-start items-start flex-row space-x-2">
            <button class="bg-white border rounded-full focus:bg-gray-800 border-gray-600 p-1.5"></button>
            <button class="bg-white border rounded-full focus:bg-gray-800 border-gray-600 p-1.5"></button>
        </div>
        <div class="flex flex-col bottom-8 left-8 space-y-4 absolute opacity-0 group-hover:opacity-100 transition duration-500">
            <button>
                <img class="dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/product-grid-2-svg1.svg" alt="add">
                <img class="hidden dark:block" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/product-grid-2-svg1dark.svg

" alt="add">
            </button>
            <button>
                <img class="dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/product-grid-2-svg2.svg" alt="view">
                <img class="hidden dark:block" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/product-grid-2-svg2dark.svg" alt="view">
            </button>
            <button>
                <img class="dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/product-grid-2-svg3.svg" alt="like">
                <img class="hidden dark:block" src="
                            https://tuk-cdn.s3.amazonaws.com/can-uploader/product-grid-2-svg3dark.svg" alt="like" />
            </button>
        </div>
    </div>

    <div class="group group-hover:bg-opacity-60 transition duration-500 relative bg-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 sm:p-28 py-36 px-10 flex justify-center items-center">
        <img class="group-hover:opacity-60 transition duration-500" src="https://i.ibb.co/DgFfGcm/paul-weaver-n-Wid-MEQsn-AQ-unsplash-removebg-preview-1.png" alt="sofa-4" />
        <div class="absolute sm:top-8 top-4 left-4 sm:left-8 flex justify-start items-start flex-col space-y-2">
            <div>
                <p class="group-hover:opacity-60 transition duration-500 text-xl leading-5 text-gray-600 dark:text-white">Muži</p>
            </div>
        </div>
        <div class="group-hover:opacity-60 transition duration-500 absolute bottom-8 right-8 flex justify-start items-start flex-row space-x-2">
            <button class="bg-white border rounded-full focus:bg-gray-800 border-gray-600 p-1.5"></button>
            <button class="bg-white border rounded-full focus:bg-gray-800 border-gray-600 p-1.5"></button>
        </div>
        <div class="flex flex-col bottom-8 left-8 space-y-4 absolute opacity-0 group-hover:opacity-100 transition duration-500">
            <button>
                <img class="dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/product-grid-2-svg1.svg" alt="add">
                <img class="hidden dark:block" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/product-grid-2-svg1dark.svg" alt="add">
            </button>
            <button>
                <img class="dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/product-grid-2-svg2.svg" alt="view">
                <img class="hidden dark:block" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/product-grid-2-svg2dark.svg" alt="view">
            </button>
            <button>
                <img class="dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/product-grid-2-svg3.svg" alt="like">
                <img class="hidden dark:block" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/product-grid-2-svg3dark.svg" alt="like" />
            </button>
        </div>
    </div>
</div>
-->
<!-- Pohlavie kategorie koniec -->
<!-- Login/Register popup form -->
<div id="login-popup" tabindex="-1"
     class="bg-black/50 overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 h-full
     items-center justify-center <?php if(isset($_SESSION['loginError'])) echo 'show';?>">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">

        <div class="relative bg-white rounded-lg shadow <?php if(isset($_SESSION['loginError'])) echo 'show';?>" id="mainLoginWindow">
            <button type="button" id="loginCloseButton"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center popup-close"><svg
                        aria-hidden="true" class="w-5 h-5" fill="#c6c7c7" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                          cliprule="evenodd"></path>
                </svg>
                <span class="sr-only">Close popup</span>
            </button>

            <div class="p-5">
                <h3 class="text-2xl mb-0.5 font-medium"></h3>
                <p class="mb-4 text-sm font-normal text-gray-800"></p>

                <div class="text-center">
                    <p class="mb-3 text-2xl font-semibold leading-5 text-slate-900">
                        Prihláste sa do vášho účtu.
                    </p>
                    <!--
                    <p class="mt-2 text-sm leading-4 text-slate-600">
                        You must be logged in to perform this action.
                    </p>
                    -->
                </div>
                <!--
                <div class="mt-7 flex flex-col gap-2">

                    <button
                            class="inline-flex h-10 w-full items-center justify-center gap-2 rounded border border-slate-300 bg-white p-2 text-sm font-medium text-black outline-none focus:ring-2 focus:ring-[#333] focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-60"><img
                                src="https://www.svgrepo.com/show/512317/github-142.svg" alt="GitHub"
                                class="h-[18px] w-[18px] ">
                        Continue with GitHub
                    </button>

                    <button
                            class="inline-flex h-10 w-full items-center justify-center gap-2 rounded border border-slate-300 bg-white p-2 text-sm font-medium text-black outline-none focus:ring-2 focus:ring-[#333] focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-60"><img
                                src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google"
                                class="h-[18px] w-[18px] ">Continue with
                        Google
                    </button>


                    <button
                            class="inline-flex h-10 w-full items-center justify-center gap-2 rounded border border-slate-300 bg-white p-2 text-sm font-medium text-black outline-none focus:ring-2 focus:ring-[#333] focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-60"><img
                                src="https://www.svgrepo.com/show/448234/linkedin.svg" alt="Google"
                                class="h-[18px] w-[18px] ">Continue with
                        LinkedIn
                    </button>
                </div>

                <div class="flex w-full items-center gap-2 py-6 text-sm text-slate-600">
                    <div class="h-px w-full bg-slate-200"></div>
                    OR
                    <div class="h-px w-full bg-slate-200"></div>
                </div>
                -->
                <form action="login/check_login.php" method="post" class="w-full" id="loginForm">
                    <label for="pouzitalskeMeno" class="sr-only">Email address</label>
                    <input name="pouzivatelskeMeno" type="text" id="loginPmeno"
                           class="block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm outline-none placeholder:text-gray-400 focus:ring-2 focus:ring-black focus:ring-offset-1"
                           placeholder="Používateľské meno" value="">
                    <label for="password" class="sr-only">Password</label>
                    <input name="heslo" type="password" id="loginHeslo" autocomplete="current-password"
                           class="mt-2 block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm outline-none placeholder:text-gray-400 focus:ring-2 focus:ring-black focus:ring-offset-1"
                           placeholder="Heslo" value="">
                    <p class="mb-3 mt-2 text-sm text-gray-500">
                        <a href="#" class="text-blue-800 hover:text-blue-600">Zabudli ste vaše heslo?</a>
                    </p>
                    <?php

                    if(isset($_SESSION['loginError'])) {
                        echo '<p class="my-2 text-sm leading-4 text-red-800" id="loginPhpError">';
                            echo $_SESSION['loginError'];
                        echo '</p>';
                        unset($_SESSION['loginError']);
                    } else {
                        echo '<p class="my-2 text-sm leading-4 text-red-800" id="loginJsError">
                            Prosím zadajte vaše údaje!
                        </p>';
                    }
                    ?>
                </form>
                    <button
                            class="inline-flex w-full items-center justify-center rounded-lg bg-pink-500 hover:bg-pink-900 p-2 py-3 text-sm font-medium text-white outline-none focus:ring-2 focus:ring-black focus:ring-offset-1 disabled:bg-gray-400"
                            onclick="prihlasitSa()">
                        Prihlásiť sa
                    </button>

                <div class="mt-6 text-center text-sm text-slate-600">
                    Nemáte ešte účet?
                    <a href="#" class="font-medium text-[#4285f4]">Registrácia</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Scripts-->
<script
        type="text/javascript"
        src="../node_modules/tw-elements/dist/js/tw-elements.umd.min.js"></script>
<script type="text/javascript"
        src="js/everything.js"></script>
</body>
</html>
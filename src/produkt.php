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
<div id="containerSidebar" class="z-40">
    <div class="navbar-menu relative z-40">
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

        </nav>
    </div>
    <div class="mx-auto lg:ml-80"></div>
</div>
<!-- Sidebar end -->
<!-- Cesta text -->
<div class="relative flex w-full mt-16">
    <h1 class="text-xl text-pink-900 py-2">Ženy>Nohavice</h1>
</div>
<div class="grid md:grid-cols-2 px-4 gap-y-4 gap-x-4 items-center w-full">
    <div class="relative flex w-full h-[500px]" id="nohavice" ></div>
    <div class="grid grid-cols-1 gap-y-1 relative w-full h-[500px]">
        <div class="relative flex w-full">
            <h1 class="font-bold">Stradivarius</h1><h2>- Džíny Straight Fit</h2>
        </div>
        <div class="relative flex float-left w-full">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Ut non gravida nisi, vel tincidunt enim. Praesent nec luctus enim, sed eleifend purus.
                Vestibulum in urna vel lorem interdum iaculis eu ac lacus.
            </p>
        </div>
        <div class="relative flex float-left w-full">
            <h3>
                (Tu budú hviezdičky)
            </h3>
        </div>
        <div class="relative flex float-left w-full">
            <h1>
                299,99€
            </h1>
        </div>
    </div>
</div>
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
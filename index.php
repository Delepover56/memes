<?php
require_once('includes\config\config.php');
session_start();

$sessionUserID = isset($_SESSION['session_id']);

$sql = "SELECT * FROM `users` WHERE `user_id` = '$sessionUserID'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $rows = $result->fetch_assoc();
    $loginID = $rows['user_id'];
    $loginUser = $rows['user_name'];
    $loginDisplay = $rows['user_display'];
    $loginEmail = $rows['user_email'];
    $loginPhone = $rows['user_phone'];
    $loginPassword = $rows['user_password'];
    $loginDOB = $rows['user_dob'];
    $loginGender = $rows['user_gender'];
    $loginRole = $rows['user_role'];
    $loginCreation = $rows['user_creationTime'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memes | Home</title>

    <!-- tailwind css -->
    <link rel="stylesheet" href="includes\css\tailwind_Output.css">
    <!-- tailwind css -->
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/d9a372d288.js" crossorigin="anonymous"></script>
    <!-- fontawesome -->

</head>

<style>
    @font-face {
        font-family: 'poppins';
        src: url(includes/fonts/Poppins/Poppins-Regular.ttf);
    }

    @font-face {
        font-family: 'lemon';
        src: url(includes/fonts/Lemon/Lemon-Regular.ttf);
    }

    * {
        margin: 0;
        padding: 0;
        font-family: 'poppins';
        color: aliceblue;
    }

    svg {
        fill: aliceblue;
    }

    body {
        min-width: 100vw;
        min-height: 100vh;
        background: rgb(18, 18, 18);
        /* background: linear-gradient(90deg, rgba(23, 23, 23, 1) 0%, rgba(106, 106, 106, 1) 100%); */
    }

    header {
        .title {
            font-family: 'lemon';
        }

        img {
            width: 40px;
        }
    }
</style>

<body>

    <header class="w-screen h-auto">



        <nav class="w-full h-full px-7 py-4 m-0 border-b border-[rgb(41,41,41)] border-solid flex justify-center items-center ">

            <div class="title w-full h-full flex justify-start items-start" title="Logo">
                <a href="index.php" class="title text-2xl">Memes</a>
            </div>

            <form action="" method="post" class="w-full h-full flex items-center">


                <input type="text" name="search" id="search" class="w-full rounded-full rounded-tr-none rounded-br-none px-5 py-3 bg-[rgb(37,37,37)] outline-none focus:outline-none" placeholder="Search...">


                <button type="submit" name="submit" class="h-full p-[12px] flex items-center justify-center rounded-full rounded-tl-none rounded-bl-none bg-[rgb(37,37,37)] border-l border-[rgba(66,66,66,0.8)] border-solid">

                    <svg width="24" data-e2e="" height="24" viewBox="0 0 48 48" fill="rgba(255, 255, 255, .34)" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M22 10C15.3726 10 10 15.3726 10 22C10 28.6274 15.3726 34 22 34C28.6274 34 34 28.6274 34 22C34 15.3726 28.6274 10 22 10ZM6 22C6 13.1634 13.1634 6 22 6C30.8366 6 38 13.1634 38 22C38 25.6974 36.7458 29.1019 34.6397 31.8113L43.3809 40.5565C43.7712 40.947 43.7712 41.5801 43.3807 41.9705L41.9665 43.3847C41.5759 43.7753 40.9426 43.7752 40.5521 43.3846L31.8113 34.6397C29.1019 36.7458 25.6974 38 22 38C13.1634 38 6 30.8366 6 22Z"></path>
                    </svg>

                </button>
            </form>

            <ul class="w-full h-full flex items-center justify-end">

                <li class="flex items-center justify-center bg-[rgb(33,33,33)] rounded-lg hover:bg-[rgb(40,40,40)] duration-[0.4s] transition-all ms-5">
                    <a href="pages\Upload.php" class="flex items-center justify-center text-center py-2 px-4">
                        <svg class="css-qeydvm-StyledPlusIcon e18d3d945" width="1em" data-e2e="" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8 2.5C7.58579 2.5 7.25 2.83579 7.25 3.25V7.25H3.25C2.83579 7.25 2.5 7.58579 2.5 8C2.5 8.41421 2.83579 8.75 3.25 8.75H7.25V12.75C7.25 13.1642 7.58579 13.5 8 13.5C8.41421 13.5 8.75 13.1642 8.75 12.75V8.75H12.75C13.1642 8.75 13.5 8.41421 13.5 8C13.5 7.58579 13.1642 7.25 12.75 7.25H8.75V3.25C8.75 2.83579 8.41421 2.5 8 2.5Z"></path>
                        </svg>
                        <span class="ml-3">Upload</span>
                    </a>
                </li>
                <?php
                if (empty($_SESSION['session_id'])) {
                ?>
                    <li class="flex items-center justify-center bg-[rgb(33,33,33)] rounded-lg hover:bg-[rgb(40,40,40)] duration-[0.4s] transition-all mx-5">
                        <a href="pages\login.php" class="flex items-center justify-center py-3 px-5"><span class="">Login</span></a>
                    </li>
                <?php
                } else {
                ?>
                    <li class="p-[3px] ms-3 h-full w-auto">
                        <div>
                            <a href="pages/Messages.php">
                                <svg width="26px" data-e2e="" height="26px" viewBox="0 0 48 48" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.17877 7.17357C2.50304 6.45894 3.21528 6 4.00003 6H44C44.713 6 45.372 6.37952 45.7299 6.99615C46.0877 7.61278 46.0902 8.37327 45.7365 8.99228L25.7365 43.9923C25.3423 44.6821 24.5772 45.0732 23.7872 44.9886C22.9972 44.9041 22.3321 44.3599 22.0929 43.6023L16.219 25.0017L2.49488 9.31701C1.97811 8.72642 1.85449 7.88819 2.17877 7.17357ZM20.377 24.8856L24.531 38.0397L40.5537 10H8.40757L18.3918 21.4106L30.1002 14.2054C30.5705 13.9159 31.1865 14.0626 31.4759 14.533L32.5241 16.2363C32.8136 16.7066 32.6669 17.3226 32.1966 17.612L20.377 24.8856Z"></path>
                                </svg>
                            </a>
                        </div>
                    </li>

                    <li class="p-[3px] ms-3 h-full w-auto">
                        <div class="notifs relative dropdown">
                            <div class="notif-icon">
                                <svg class="cursor-pointer" width="32px" data-e2e="" height="32px" viewBox="0 0 32 32" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M24.0362 21.3333H18.5243L15.9983 24.4208L13.4721 21.3333H7.96047L7.99557 8H24.0009L24.0362 21.3333ZM24.3705 23.3333H19.4721L17.2883 26.0026C16.6215 26.8176 15.3753 26.8176 14.7084 26.0026L12.5243 23.3333H7.62626C6.70407 23.3333 5.95717 22.5845 5.9596 21.6623L5.99646 7.66228C5.99887 6.74352 6.74435 6 7.66312 6H24.3333C25.2521 6 25.9975 6.7435 26 7.66224L26.0371 21.6622C26.0396 22.5844 25.2927 23.3333 24.3705 23.3333ZM12.6647 14C12.2965 14 11.998 14.2985 11.998 14.6667V15.3333C11.998 15.7015 12.2965 16 12.6647 16H19.3313C19.6995 16 19.998 15.7015 19.998 15.3333V14.6667C19.998 14.2985 19.6995 14 19.3313 14H12.6647Z"></path>
                                </svg>
                            </div>
                            <div class="dropdown-content hidden">
                                <h1 class="text-white">Notifications</h1>
                            </div>
                            <span class="count notif-count hidden">0</span>
                        </div>
                    </li>

                    <li class="flex items-center justify-center shadow-zinc-500 rounded-full hover:shadow-[rgb(32,32,32)] focus:shadow-[rgb(21,20,20)] duration-[0.4s] transition-all mx-5 cursor-pointer">
                        <div class="relative dropdown">
                            <div id="userIcon" class="info flex w-full h-full items-center justify-center cursor-pointer" onclick="toggleDropdown(event)">
                                <img src="./includes/assets/images/user.jpg" alt="user" class="rounded-full">
                            </div>

                            <!-- Dropdown menu -->
                            <ul id="dropdownMenu" class="absolute dropdown-menu hidden bg-[rgb(30,30,30)] right-0 mt-[16px] rounded-lg shadow-lg shadow-black" style="width: 200px; right: -27px;">
                                <li class="mt-3 mb-[6px]">
                                    <a href="./pages/profile.php" class="block px-4 py-2 text-sm text-white hover:bg-[rgb(20,20,20)]">View Profile</a>
                                </li>
                                <li class="mb-3 mt-[6px]">
                                    <a href="./pages/signout.php" class="block px-4 py-2 text-sm text-white hover:bg-[rgb(20,20,20)]">Sign Out</a>
                                </li>
                            </ul>
                        </div>
                    </li>


                <?php
                }
                ?>
            </ul>
        </nav>

    </header>

    <aside class="w-[300px] h-screen fixed border-r border-[rgb(41,41,41)] border-solid overflow-hidden">
        <ul class="list-none">
            <li class="ml-[10px] w-full hover:bg-[rgb(38,38,38)]">
                <div>
                    <a href="index.php" class="flex w-full h-full content-center items-center my-[5px] p-4 ">
                        <svg width="32" data-e2e="" height="32" viewBox="0 0 48 48" fill="rgba(255, 255, 255, .9)" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M23.0484 7.84003C23.6014 7.38666 24.3975 7.38666 24.9504 7.84001L41.051 21.04C41.5411 21.4418 41.7258 22.1082 41.5125 22.705C41.2991 23.3017 40.7338 23.7 40.1 23.7H37.769L36.5769 36.7278C36.4592 38.0149 35.3798 39 34.0873 39H13.9127C12.6202 39 11.5409 38.0149 11.4231 36.7278L10.231 23.7H7.89943C7.2657 23.7 6.70035 23.3017 6.487 22.705C6.27364 22.1083 6.45833 21.4418 6.9484 21.04L23.0484 7.84003ZM23.9995 10.9397L12.0948 20.7H12.969L14.369 36H22.4994V28.3138C22.4994 27.7616 22.9471 27.3138 23.4994 27.3138H24.4994C25.0517 27.3138 25.4994 27.7616 25.4994 28.3138V36H33.631L35.031 20.7H35.9045L23.9995 10.9397Z"></path>
                        </svg>
                        <span class="ml-3">For You</span>
                    </a>
                </div>
            </li>
            <li class="ml-[10px] w-full hover:bg-[rgb(38,38,38)]">
                <div>
                    <a href="index.php" class="flex content-center w-full h-full items-center my-[5px] p-4 ">
                        <svg width="32" data-e2e="" height="32" viewBox="0 0 48 48" fill="rgba(255, 59, 92, 1)" xmlns="http://www.w3.org/2000/svg">
                            <path d="M25.5 17C25.5 21.1421 22.1421 24.5 18 24.5C13.8579 24.5 10.5 21.1421 10.5 17C10.5 12.8579 13.8579 9.5 18 9.5C22.1421 9.5 25.5 12.8579 25.5 17Z"></path>
                            <path d="M7.10396 34.7906C8.78769 30.2189 12.8204 27 18.0009 27C23.1818 27 27.2107 30.2213 28.8958 34.7898C29.3075 35.906 28.6141 37 27.5 37H8.5C7.38629 37 6.69289 35.9067 7.10396 34.7906Z"></path>
                            <path d="M40.6308 37H32C31.2264 34.1633 30.0098 31.5927 28.144 29.7682C29.5384 28.9406 31.1829 28.5 33 28.5C37.239 28.5 40.536 30.8992 41.9148 35.0108C42.2516 36.0154 41.5423 37 40.6308 37Z"></path>
                            <path d="M33 26.5C36.0376 26.5 38.5 24.0376 38.5 21C38.5 17.9624 36.0376 15.5 33 15.5C29.9624 15.5 27.5 17.9624 27.5 21C27.5 24.0376 29.9624 26.5 33 26.5Z"></path>
                        </svg>
                        <span class="ml-3">Following</span>
                    </a>
                </div>
            </li>
        </ul>
    </aside>

    <script src="./includes/js/index.js"></script>
</body>

</html>
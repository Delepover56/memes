<?php
require_once('includes\config\config.php');
session_start();

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
        width: 100vw;
        height: 100vh;
        background: rgb(18, 18, 18);
        /* background: linear-gradient(90deg, rgba(23, 23, 23, 1) 0%, rgba(106, 106, 106, 1) 100%); */
    }

    header {
        .title {
            font-family: 'lemon';
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


                <button type="submit" name="submit" class="h-full p-4 flex items-center justify-center rounded-full rounded-tl-none rounded-bl-none bg-[rgb(37,37,37)] border-l border-[rgba(66,66,66,0.8)] border-solid">

                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">

                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />

                    </svg>

                </button>
            </form>

            <ul class="w-full h-full flex items-center justify-end text-base md:text-sm">

                <li class="flex items-center justify-center shadow-md shadow-zinc-900 rounded-2xl rounded-tr-none rounded-tl-none hover:shadow-red-600 duration-[0.4s] transition-all mx-5">
                    <a href="pages\Upload.php" class="flex items-center justify-center  py-3 px-5"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="aliceblue" class="bi bi-upload" viewBox="0 0 16 16">
                            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5" />
                            <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708z" />
                        </svg> <span class="ml-3">
                            Upload</span></a>
                </li>
                <li>
                    <?php
                    if (empty($_SESSION['ID'])) {
                        echo '<li class="flex items-center justify-center shadow-md shadow-zinc-900 rounded-2xl rounded-tr-none rounded-tl-none hover:shadow-red-600 duration-[0.4s] transition-all mx-5">
                    <a href="pages\login.php" class="flex items-center justify-center  py-3 px-5"><span class="ml-3">Login</span></a>
                </li>';
                    } else {
                        echo '<li class="flex items-center justify-center shadow-md shadow-zinc-900 rounded-2xl rounded-tr-none rounded-tl-none hover:shadow-red-600 duration-[0.4s] transition-all mx-5">
                    <a href="pages\profile.php" class="flex items-center justify-center  py-3 px-5"><img src="includes\assets\images\user.jpg" alt="user"><span class="ml-3">$session_DISPLAY</span></a>
                </li>';
                    }
                    ?>
                </li>
            </ul>



        </nav>

    </header>

</body>

</html>
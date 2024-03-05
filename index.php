<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memes | Home</title>

    <!-- tailwind css -->
    <link rel="stylesheet" href="./includes/css/tailwind_Output.css">
    <!-- tailwind css -->
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/d9a372d288.js" crossorigin="anonymous"></script>
    <!-- fontawesome -->
    <!-- boxicons stuff -->
    <link rel="stylesheet" href="./includes/boxicons/css/animations.css">
    <link rel="stylesheet" href="./includes/boxicons/css/boxicons.css">
    <link rel="stylesheet" href="./includes/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="./includes/boxicons/css/transformations.css">

</head>

<style>
    @font-face {
        font-family: 'poppins';
        src: url(./includes/fonts/Poppins/Poppins-Regular.ttf);
    }

    @font-face {
        font-family: 'lemon';
        src: url(./includes/fonts/Lemon/Lemon-Regular.ttf);
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
        background: rgb(23, 23, 23);
        background: linear-gradient(90deg, rgba(23, 23, 23, 1) 0%, rgba(106, 106, 106, 1) 100%);
    }

    header {
        h1 {
            a {
                font-family: 'lemon';
            }
        }
    }
</style>

<body>

    <header class="w-screen px-7 m-0 shadow-lg shadow-[rgba(0,0,0,0.75)] flex items-center justify-center">

        <h1>
            <a href="./index.php" class="text-2xl">Memes</a>
        </h1>

        <nav class="w-full">
            <ul class="flex items-center justify-center">
                <li class="flex items-center justify-center shadow-md shadow-black py-3 px-5">
                    <a href="./index.php" class="flex items-center justify-center"><img src="./includes/boxicons/svg/solid/bxs-home.svg" alt="home"> Home</a>
                </li>
                <li class="flex items-center justify-center">
                    <a href="./index.php" class="flex items-center justify-center"><img src="./includes/boxicons/svg/solid/bxs-up-arrow-circle.svg" alt="upload"> Upload</a>
                </li>
            </ul>
        </nav>

    </header>

</body>

</html>
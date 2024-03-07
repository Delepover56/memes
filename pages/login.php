<?php
require_once('../includes/config/config.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memes | Login</title>
    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="./css/tailwind_Output.css">
    <!-- Custom CSS -->
    <style>
        @font-face {
            font-family: 'poppins';
            src: url(../includes/fonts/Poppins/Poppins-Regular.ttf);
        }

        @font-face {
            font-family: 'lemon';
            src: url(../includes/fonts/Lemon/Lemon-Regular.ttf);
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
            background: rgb(18, 18, 18);
            /* background: linear-gradient(90deg, rgba(23, 23, 23, 1) 0%, rgba(106, 106, 106, 1) 100%); */
        }
    </style>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/d9a372d288.js" crossorigin="anonymous"></script>
</head>

<body class="bg-gray-900 flex justify-center items-center h-screen">

    <div class="container mx-auto p-4">
        <form action="" method="post" class="bg-gray-800 shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full max-w-sm">
            <div class="mb-4">
                <label for="username" class="block text-gray-300 text-sm font-bold mb-2">
                    Username: <span class="text-red-500">*</span>
                </label>
                <input type="text" name="username" id="username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="display" class="block text-gray-300 text-sm font-bold mb-2">
                    Display name:
                </label>
                <input type="text" name="display" id="display" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-6">
                <label for="email" class="block text-gray-300 text-sm font-bold mb-2">
                    Email: <span class="text-red-500">*</span>
                </label>
                <input type="email" name="email" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Sign Up
                </button>
            </div>
        </form>
    </div>

</body>

</html>
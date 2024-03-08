<?php
require_once('../includes/config/config.php');
session_start();

if (isset($_SESSION['session_id'])) {
    header("Location: ../index.php");
    exit();
}

if (isset($_POST['submit'])) {
    $loginMethod = $_POST['loginInput'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']) ? true : false;

    if (filter_var($loginMethod, FILTER_VALIDATE_EMAIL)) {
        $checkEmailSql = "SELECT * FROM `users` WHERE `user_email` = '$loginMethod'";
        $resultEmailCheck =  $conn->query($checkEmailSql);

        if ($resultEmailCheck->num_rows > 0) {
            $row = $resultEmailCheck->fetch_assoc();
            // Compare the provided password with the password stored in the database
            if ($row['user_password'] == $password) {
                // Password is correct, login successful
                $_SESSION['session_id'] = $row['user_id'];
                $_SESSION['session_name'] = $row['user_name'];
                $_SESSION['session_display'] = $row['user_display'];
                $_SESSION['session_email'] = $row['user_email'];
                $_SESSION['session_phone'] = $row['user_phone'];
                $_SESSION['session_password'] = $row['user_password'];
                $_SESSION['session_dob'] = $row['user_dob'];
                $_SESSION['session_gender'] = $row['user_gender'];
                $_SESSION['session_role'] = $row['user_role'];
                $_SESSION['session_creation'] = $row['user_creationTime'];

                // Set remember me cookie if checked
                if ($remember) {
                    setcookie('remember_me', $loginMethod, time() + (30 * 24 * 60 * 60), '/');
                }

                // Redirect to dashboard or any other page
                header("Location: ../index.php");
                exit();
            } else {
                // Password is incorrect
                echo "<script>alert('Password is incorrect.')</script>";
            }
        } else {
            // Email not found in the database
            echo "<script>alert('Email is incorrect.')</script>";
        }
    } else {
        $checkUserSql = "SELECT * FROM `users` WHERE `user_name` = '$loginMethod'";
        $resultUserCheck =  $conn->query($checkUserSql);

        if ($resultUserCheck->num_rows > 0) {
            $row = $resultUserCheck->fetch_assoc();
            // Compare the provided password with the password stored in the database
            if ($row['user_password'] == $password) {
                // Password is correct, login successful
                $_SESSION['session_id'] = $row['user_id'];
                $_SESSION['session_name'] = $row['user_name'];
                $_SESSION['session_display'] = $row['user_display'];
                $_SESSION['session_email'] = $row['user_email'];
                $_SESSION['session_phone'] = $row['user_phone'];
                $_SESSION['session_password'] = $row['user_password'];
                $_SESSION['session_dob'] = $row['user_dob'];
                $_SESSION['session_gender'] = $row['user_gender'];
                $_SESSION['session_role'] = $row['user_role'];
                $_SESSION['session_creation'] = $row['user_creationTime'];

                // Set remember me cookie if checked
                if ($remember) {
                    setcookie('remember_me', $loginMethod, time() + (30 * 24 * 60 * 60), '/');
                }

                // Redirect to dashboard or any other page
                header("Location: ../index.php");
                exit();
            } else {
                // Password is incorrect
                echo "<script>alert('Password is incorrect.')</script>";
            }
        } else {
            // Username not found in the database
            echo "<script>alert('Username is incorrect.')</script>";
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memes | Login</title>
    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="../includes/css/tailwind_Output.css">
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

        div {
            .title a {
                font-family: 'lemon';
            }

            form {
                svg {
                    fill: black;
                }
            }
        }
    </style>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/d9a372d288.js" crossorigin="anonymous"></script>
</head>

<body class="flex justify-center items-center h-screen w-screen">

    <div action="" method="post" class="bg-[rgb(30,30,30)] rounded-lg shadow-lg shadow-gray-950 w-[500px] h-[600px] px-7 py-12 flex flex-col">
        <div class="title w-full text-center mb-[50px] mt-[35px] text-3xl">
            <a href="../index.php">Memes</a>
        </div>
        <form action="" method="post" class="formField w-full h-full flex flex-col justify-start items-center">
            <label for="loginInput" class="w-full text-start mb-4">Username or Email:</label>
            <input type="text" name="loginInput" id="loginInput" class="px-4 py-3 w-full text-black outline-none rounded-xl mb-7 cursor-text focus:shadow-md  duration-[0.4s] transition-all">
            <label for="password" class="w-full text-start mb-4">Password:</label>
            <div class="password w-full flex mb-7">
                <input type="password" name="password" id="password" class="px-4 py-3 w-full text-black outline-none rounded-xl rounded-tr-none rounded-br-none cursor-text focus:shadow-md  duration-[0.4s] transition-all">
                <span id="passwordToggle" class="h-full w-[10%] bg-white rounded-tr-xl rounded-br-xl flex justify-center items-center border-l border-[rgba(191,191,191,0.74)] border-solid cursor-pointer duration-[0.4s] transition-all" onclick="togglePassword()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                    </svg>
                </span>
            </div>
            <div class="check w-full flex justify-start items-center mb-7 pl-[11px]">
                <input type="checkbox" name="remember" class="cursor-pointer" id="remember">
                <label class="ml-5 cursor-text">Remember me</label>
            </div>
            <input type="submit" name="submit" value="Login" class="px-4 py-3 w-1/2 text-white rounded-full cursor-pointer bg-[rgb(51,51,51)] shadow-md shadow-zinc-900 hover:shadow-md hover:shadow-red-600 duration-[0.5s] transition-all">
        </form>

        <div class="note w-full flex justify-center items-center">
            <span>Don't have an account? <a href="./signup.php" class="text-zinc-400 ml-2">Create one now!</a></span>
        </div>

    </div>

    <script src="../includes/js/login.js"></script>
</body>

</html>
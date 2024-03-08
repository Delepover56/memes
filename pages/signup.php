<?php
require_once('../includes/config/config.php');
session_start();

if (isset($_SESSION['session_id'])) {
    header("Location: ../index.php");
    exit();
}

if (isset($_POST["submit"])) {
    $user = $_POST["user"];
    $display = $_POST["display"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $dob = $_POST["dob"];
    // Check if "gender" is set, otherwise set default value
    $gender = isset($_POST["gender"]) ? $_POST["gender"] : "";
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    // Checking for blank fields
    if ($user == "" || $display == "" || $email == "" || $phone == "" || $dob == "" || $gender == "" || $password == "" || $cpassword == "") {
        echo "<script>alert('Please fill all the fields.')</script>";
    } elseif (!preg_match('/^(?!\\d|\\.)(?!.*\\.{2})[a-z\\d]+(?:[._]*[a-z\\d]+)*$/', $user)) {
        echo "<script>alert('Username can only contain lowercase letters, digits, periods, and underscores.')</script>";
    } elseif (!preg_match('/^\d+$/', $phone)) {
        echo "<script>alert('Please enter a valid phone number.')</script>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Please enter a valid email address.')</script>";
    } elseif ($password !== $cpassword) {
        echo "<script>alert('Passwords do not match.')</script>";
    } else {
        // Check if username, email, or phone number already exists
        $checkSql = "SELECT * FROM users WHERE user_name = '$user' OR user_email = '$email' OR user_phone = '$phone'";
        $resultCheck = $conn->query($checkSql);

        if ($resultCheck->num_rows > 0) {
            $row = $resultCheck->fetch_assoc();
            if ($row['user_name'] == $user) {
                echo "<script>alert('Username already exists.')</script>";
            } elseif ($row['user_email'] == $email) {
                echo "<script>alert('Email already exists.')</script>";
            } elseif ($row['user_phone'] == $phone) {
                echo "<script>alert('Phone number already exists.')</script>";
            }
        } else {
            // Insert the new user if no existing records found
            $signupSql = "INSERT INTO `users` (`user_name`, `user_display`, `user_email`, `user_phone`, `user_dob`, `user_gender`, `user_password`, `user_creationTime`) 
            VALUES ('$user', '$display', '$email', '$phone', '$dob', '$gender', '$password', current_timestamp())";
            $resultSignup = $conn->query($signupSql);

            if ($resultSignup) {
                header("Location: login.php");
            }
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memes | Sign Up</title>
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

    <div action="" method="post" class="bg-[rgb(30,30,30)] rounded-lg shadow-lg shadow-gray-950 w-auto h-auto px-7 py-12 flex flex-col">
        <div class="title w-full text-center mb-[20px] mt-[10px] text-3xl">
            <a href="../index.php">Memes</a>
        </div>

        <form action="" method="post" class="flex flex-col mx-5 my-7">
            <div class="flex justify-start items-start w-full">
                <div class="flex flex-col mr-20 w-full">
                    <label for="user" class="w-full text-start mb-4">User:</label>
                    <input type="text" name="user" id="user" class="px-4 py-[8px] w-full text-black outline-none rounded-xl mb-7 cursor-text focus:shadow-md  duration-[0.4s] transition-all">
                </div>
                <div class="flex flex-col w-full">
                    <label for="display" class="w-full text-start mb-4">Display Name:</label>
                    <input type="text" name="display" id="display" class="px-4 py-[8px] w-full text-black outline-none rounded-xl mb-7 cursor-text focus:shadow-md  duration-[0.4s] transition-all">
                </div>
            </div>
            <div class="flex w-full">
                <div class="flex flex-col w-full">
                    <label for="email" class="w-full text-start mb-4">Email:</label>
                    <input type="text" name="email" id="email" class="px-4 py-[8px] w-full text-black outline-none rounded-xl mb-7 cursor-text focus:shadow-md  duration-[0.4s] transition-all">
                </div>
            </div>
            <div class="flex w-full">
                <div class="flex flex-col w-[250px] mr-5">
                    <label for="phone" class="w-full text-start mb-4">Phone:</label>
                    <input type="text" name="phone" id="phone" class="px-4 py-[8px] w-full text-black outline-none rounded-xl mb-7 cursor-text focus:shadow-md  duration-[0.4s] transition-all">
                </div>
                <div class="flex flex-col mr-5 w-auto">
                    <label for="dob" class="w-full text-start mb-4">DOB:</label>
                    <input type="date" name="dob" id="date" class="px-4 py-[8px] w-full text-black outline-none rounded-xl mb-7 cursor-text focus:shadow-md  duration-[0.4s] transition-all">
                </div>
                <div class="flex flex-col w-auto">
                    <label for="gender" class="w-full text-start mb-4">Gender:</label>
                    <select name="gender" id="gender" class="px-4 py-[8px] w-full text-black outline-none rounded-xl mb-7 cursor-text focus:shadow-md  duration-[0.4s] transition-all">
                        <option value="" selected disabled class="text-black">Select Your Gender</option>
                        <option value="Male" class="text-black">Male</option>
                        <option value="Female" class="text-black">Female</option>
                    </select>
                </div>
            </div>
            <div class="flex h-auto w-full mb-3">
                <div class="flex flex-col mr-7 h-full w-full">
                    <label for="password" class="w-full text-start mb-4">Password:</label>
                    <div class="password flex mb-7">
                        <input type="password" name="password" id="password" class="px-4 py-[8px] w-full text-black outline-none rounded-xl rounded-tr-none rounded-br-none cursor-text focus:shadow-md  duration-[0.4s] transition-all">
                        <span id="passwordToggle" class="w-[20%] bg-white rounded-tr-xl rounded-br-xl flex justify-center items-center border-l border-[rgba(191,191,191,0.74)] border-solid cursor-pointer duration-[0.4s] transition-all" onclick="togglePasswordVisibility('password')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="flex flex-col h-full w-full">
                    <label for="cpassword" class="w-full text-start mb-4">Repeat Password:</label>
                    <div class="cpassword flex mb-7">
                        <input type="password" name="cpassword" id="cpassword" class="px-4 py-[8px] w-full text-black outline-none rounded-xl rounded-tr-none rounded-br-none cursor-text focus:shadow-md  duration-[0.4s] transition-all">
                        <span id="cpasswordToggle" class="w-[20%] bg-white rounded-tr-xl rounded-br-xl flex justify-center items-center border-l border-[rgba(191,191,191,0.74)] border-solid cursor-pointer duration-[0.4s] transition-all" onclick="togglePasswordVisibility('cpassword')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
            <div class="w-full flex justify-center items-center">
                <input type="submit" name="submit" value="Submit" class="px-4 py-3 w-[190px] text-white rounded-full cursor-pointer bg-[rgb(51,51,51)] shadow-md shadow-zinc-900 hover:shadow-md hover:shadow-red-600 duration-[0.5s] transition-all">
            </div>
        </form>

        <div class="note w-full flex justify-center items-center">
            <span>Already have an account? <a href="./login.php" class="text-zinc-400 ml-2">Login here!</a></span>
        </div>

    </div>

    <script src="../includes/js/signup.js"></script>
</body>

</html>
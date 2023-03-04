<?php

require_once('./db.php');

$username = $conn->real_escape_string($_POST['username']);
$password = $conn->real_escape_string($_POST['password']);

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $sql ="SELECT * FROM Utenti WHERE username = '$username'";

    if($result = $conn->query($sql)){
        if($result->num_rows === 1){
            $row = $result->fetch_array(MYSQLI_ASSOC);
            if(password_verify($password, $row['Password'])){
                session_start();
                $_SESSION['id'] = $row['id'];
                $_SESSION['username'] = $row['Username'];

                header("location: ../index.php");
            }else{ ?>
                <html>
                <head>
                    <meta charset="utf-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <link href="./output.css" rel="stylesheet">
                    <script src="https://cdn.tailwindcss.com"></script>
                </head>
                <body class="h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7;">
                    <!-- component -->
                <div class="min-h-screen flex flex-col justify-center sm:py-12">
                <div class="p-10 xs:p-0 mx-auto md:w-full md:max-w-md"> 
                    <div class="bg-white shadow w-full rounded-lg divide-y divide-gray-200">
                    <div class="px-5 py-7">
                        <h1>Password errata!</h1>

                        <button type="button" onclick="location.href='../login.html'" class="transition duration-200 bg-blue-500 hover:bg-blue-600  text-white w-full py-2.5 rounded-lg text-sm shadow-sm hover:shadow-md font-semibold text-center inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4 inline-block align-text-top">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>    
                        <span class="inline-block mr-2">Riprova</span>
                        </button>
                        </div>
                    </div>
                </div>
                </div>
                </body>
                </html>
            <?php
            }
        }else{ ?>
                <html>
                <head>
                    <meta charset="utf-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <link href="./output.css" rel="stylesheet">
                    <script src="https://cdn.tailwindcss.com"></script>
                </head>
                <body class="h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7;">
                    <!-- component -->
                <div class="min-h-screen flex flex-col justify-center sm:py-12">
                <div class="p-10 xs:p-0 mx-auto md:w-full md:max-w-md"> 
                    <div class="bg-white shadow w-full rounded-lg divide-y divide-gray-200">
                    <div class="px-5 py-7">
                        <h1>L'username da te inserito non esiste!</h1>
                        <button type="button" onclick="location.href='../login.html'" class="transition duration-200 bg-blue-500 hover:bg-blue-600  text-white w-full py-2.5 rounded-lg text-sm shadow-sm hover:shadow-md font-semibold text-center inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4 inline-block align-text-top">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>    
                        <span class="inline-block mr-2">Riprova</span>
                        </button>
                        </div>
                    </div>
                </div>
                </div>
                </body>
                </html>
            <?php
            }
        }else{
                echo "Errore";
            }
            $conn->close();
        }
?>
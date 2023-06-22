<?php

require_once('../sql/functions/db_pdo.php');

$pdo = getPdo();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    $_SESSION["loggedInUser"] = true;
    $_SESSION["username"] = "Edith Jansen";
    echo "Test";
    sleep(10);
    header('location:admin.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-stack">
    <div class="container mx-auto px-4">
            <div class="grid grid-cols-2">
                <div class="col-span-1">
                    <img src="../src/img/Middel 2.svg" alt="" class="w-full">
                </div>
                <div class="col-span-1">
                    <h1 class="text-2xl">Test</h1>
                    <form action="#" method="POST">
                        <div class="section">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="rounded w-full text-sm text-slate-500 border">
                        </div>
                        <div class="section">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="rounded w-full text-sm text-slate-500 border">
                        </div>
                        <div class="section mt-5">
                            <input type="submit" value="submit" class="submit flex items-center justify-center rounded-md border border-transparen px-4 py-3  font-medium text-primary shadow-sm hover:bg-indigo-50 sm:px-8 ">
                            <div class="btn mt-5">
                                <a href="index.php" class="flex items-center justify-center rounded-md border border-transparen px-4 py-3 text-base font-medium text-primary shadow-sm hover:bg-indigo-50 sm:px-8 ">Go back</a>                
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </section>

    </div>
</body>
</html>

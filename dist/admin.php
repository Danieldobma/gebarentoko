<?php

//Connect to database and session

session_start();
require_once('../sql/functions/db_pdo.php');
$pdo = getPdo();

// User verification

if (isset($_SESSION["loggedInUser"]) && $_SESSION["loggedInUser"]) {
    $username = $_SESSION["username"];
} else {
    header("location:login.php");
    exit();
}

// Check if data from $page to edit has been selected, otherwise default to nieuws

if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = "nieuws";
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = null;
}


// Check if action is defined and perform said action if defined

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'edit':
            if (isset($_GET['id'])) {
                $editData = $pdo->query("SELECT * FROM $page WHERE id = $id")->fetch();
                $title = $editData["title"];
                $text = $editData["text"];
                $release_date = $editData["release_date"];
                $image = $editData["image"];
            }
            break;

        case 'delete':
            $pdo->query("DELETE FROM $page WHERE id = $id");
            header("location:admin.php");
            break;

        default:
            break;
    }
}

// Check if method is POST for adding new data to database
// If POST is the request method, check if required fields are filled in, otherwise return error

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_GET['action'])) {
            $query = "UPDATE $page SET 
            title           = :title,
            text            = :text,
            release_date    = :release_date,
            image           = :image
            WHERE id = $id";
    } else {
            $query = "INSERT INTO $page (title, text, release_date, image) VALUES (
            :title,
            :text,
            :release_date,
            :image)";
    }

    if (isset($_POST['title']) && isset($_POST['text'])) {
        $title = $_POST["title"];
        $text = $_POST["text"];
        $release_date = $_POST["release_date"];
        $image = $_POST["image"];
    } else {
        $error = "Titel of text veld is niet ingevult";
    }
}

if (isset($query)) {
    $statement = $pdo->prepare($query);
    $statement->bindValue(":title", $_POST['title'] ?? '', PDO::PARAM_STR);
    $statement->bindValue(":text", $_POST['text'] ?? '', PDO::PARAM_STR);
    $statement->bindValue(":release_date", $_POST['release_date'] ?? '', PDO::PARAM_STR);
    $statement->bindValue(":image", $_POST['image'] ?? '', PDO::PARAM_STR);
    $statement->execute();
}




// Get content from table to show on site

$pageContent = $pdo->query("SELECT * FROM $page");


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/lam7wjf.css">
    <title>Admin</title>
</head>

<body class="font-stack">
    <!-- Select which page to edit -->
    <header>
        <nav class="bg-gray-800">
            <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
                <div class="relative flex h-48 items-center justify-between">
                    <div class="absolute inset-y-0 right-0 flex items-center sm:hidden">
                        <!-- Mobile button -->
                        <button type="button"
                            class="inline-flex flex-col items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                            aria-controls="mobile-menu" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <svg class="fill-neutral" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                <path
                                    d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512zm50.7-186.9L162.4 380.6c-19.4 7.5-38.5-11.6-31-31l55.5-144.3c3.3-8.5 9.9-15.1 18.4-18.4l144.3-55.5c19.4-7.5 38.5 11.6 31 31L325.1 306.7c-3.2 8.5-9.9 15.1-18.4 18.4zM288 256c0-17.7-14.3-32-32-32s-32 14.3-32 32s14.3 32 32 32s32-14.3 32-32z" />
                            </svg>
                            <div class="">Menu</div>
                            <svg class="hidden h-10 w-10" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="flex flex-1 items-center justify-center md:justify-between">
                        <div class="flex flex-shrink-0 items-center">
                            <!-- // logo gebaren toko -->
                            <img class="block h-40 w-auto lg:hidden" src="../src/img/Middel 2.svg" alt="Your company">
                            <img class="hidden h-40 w-auto lg:block" src="../src/img/Middel 2.svg" alt="Your company">
                        </div>
                        <div class="hidden sm:ml-6 sm:block">
                            <div class="flex space-x-4">
                                <!-- <a href="admin.php?page=aanbod">Aanbod</a>
                                <a href="admin.php?page=about">About</a>
                                <a href="admin.php?page=nieuws">Nieuws</a> -->
                                <a href="index.php"
                                    class="hover:bg-gray-700 text-white px-3 py-2 rounded-md text-3xl font-medium"
                                    aria-current="page">Home</a>

                                <a href="admin.php?page=aanbod"
                                    class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-3xl font-medium">Aanbod</a>

                                <a href="admin.php?page=about"
                                    class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-3xl font-medium">About</a>

                                <a href="admin.php?page=nieuws"
                                    class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-3xl font-medium">Nieuws</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show / hide based on menu state -->
            <div class="sm:hidden" id="mobile-menu">
                <div class="space-y-1 px-2 pt-2 pb-3">
                    <a href="#" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-2xl font-medium"
                        aria-current="page">Dashboard</a>

                    <a href="#"
                        class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-2xl font-medium">Team</a>

                    <a href="#"
                        class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-2xl font-medium">Projects</a>

                    <a href="#"
                        class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-2xl font-medium">Calendar</a>
                </div>
            </div>

        </nav>
    </header>





    <!-- Initially blank form for adding and changing data -->
    <!-- Data gets added if verander button has been pressed -->

    <div class="container mx-auto px-4">
        <section>

            <h1 class="text-2xl font-bold">
                Huidige bewerking voor:
                <?= $page ?>
            </h1>
            <div class="form">
                <form action="" method="POST">
                    <div class="form_section">
                        <label for="title">Titel</label>
                        <input type="text" name="title" class="rounded w-full text:sm text-slate-500 border"
                            value="<?= $title ?? ''?>">
                    </div>

                    <div class="form_section">
                        <label for="text">Text</label>
                        <textarea class="rounded w-full text:sm text-slate-500 border"></textarea>
                        <!-- <input type="text" name="text" class="rounded w-full text:sm text-slate-500 border"
                            value="<?= $text ?? '' ?>"> -->
                    </div>

                    <div class="form_section">
                        <label for="release_date">Datum</label>
                        <input type="text" name="release_date" class="rounded w-full text:sm text-slate-500 border"
                            value="<?= $release_date ?? '' ?>">
                    </div>

                    <div class="form_section">
                        <label for="image">Afbeelding</label>
                        <input type="file" name="image" class="rounded w-full text:sm text-slate-500 border"
                            value="<?= $image ?? '' ?>">
                    </div>

                    <div class="mt-5">
                        <input type="submit" value="submit"
                            class="submit flex items-center justify-center rounded-md border border-transparen px-4 py-3  font-medium text-primary shadow-sm hover:bg-indigo-50 sm:px-8">
                    </div>
                </form>
                <div class="btn mt-5">
                    <a href="logout.php"
                        class="flex items-center justify-center rounded-md border border-transparen px-4 py-3 text-base font-medium text-primary shadow-sm hover:bg-indigo-50 sm:px-8 ">Log
                        out</a>
                </div>
            </div>
        </section>

        <!-- Table to display contents on currently selected page -->

        <section>
            <h1 class="text-2xl"> Content </h1>

            <table class="table-auto">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                            Titel</th>
                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                            Wijzig</th>
                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                            Verwijder</th>
                    </tr>
                </thead>
                <?php foreach ($pageContent as $content) : ?>
                <tr>
                    <th>
                        <?= $content['title'] ?? ''?>
                    </th>
                    <th>
                        <a href="admin.php?page=<?= $page ?>&action=edit&id=<?= $content['id'] ?? '' ?>"><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                        </a>
                    </th>
                    <th>
                        <a href="admin.php?page=<?= $page ?>&action=delete&id=<?= $content['id'] ?? '' ?>"><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                        </a>
                    </th>
                </tr>
                <?php endforeach ?>
            </table>
        </section>
    </div>
</body>

</html>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/style/style.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-stack">
<header>
    <nav class="bg-gray-800">
      <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-48 items-center justify-between">
          <div class="absolute inset-y-0 right-0 flex items-center sm:hidden">
            <!-- Mobile menu button-->
            <button type="button" class="inline-flex flex-col items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
              <span class="sr-only">Open main menu</span>
              <!--
                Icon when menu is closed.
    
                Heroicon name: outline/bars-3
    
                Menu open: "hidden", Menu closed: "block"
              -->
              <svg class="fill-neutral" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512zm50.7-186.9L162.4 380.6c-19.4 7.5-38.5-11.6-31-31l55.5-144.3c3.3-8.5 9.9-15.1 18.4-18.4l144.3-55.5c19.4-7.5 38.5 11.6 31 31L325.1 306.7c-3.2 8.5-9.9 15.1-18.4 18.4zM288 256c0-17.7-14.3-32-32-32s-32 14.3-32 32s14.3 32 32 32s32-14.3 32-32z"/></svg>
              <div class="">menu</div>
              <!--
                Icon when menu is open.
    
                Heroicon name: outline/x-mark
    
                Menu open: "block", Menu closed: "hidden"
              -->
              <svg class="hidden h-10 w-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
          <div class="flex flex-1 items-center justify-center md:justify-between">
            <div class="flex flex-shrink-0 items-center">
              <img class="block h-40 w-auto lg:hidden" src="../src/img/Middel 2.svg" alt="Your Company">
              <img class="hidden h-40 w-auto lg:block" src="../src/img/Middel 2.svg" alt="Your Company">
            </div>
            <div class="hidden sm:ml-6 sm:block">
              <div class="flex space-x-4">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a href="index.php" class="bg-neutral text-white px-3 py-2 rounded-md text-3xl font-medium" aria-current="page">Home</a>
    
                <a href="about.php" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-3xl font-medium">Info</a>
    
                <a href="news.php" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-3xl font-medium">Nieuws</a>
                
                <a href="news.php" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-3xl font-medium">Aanbod</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    
      <!-- Mobile menu, show/hide based on menu state. -->
      <div class="sm:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pt-2 pb-3">
          <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
          <a href="index.php" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-2xl font-medium" aria-current="page">Home</a>
    
          <a href="about.php" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-2xl font-medium">Info</a>
    
          <a href="news.php" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-2xl font-medium">Nieuws</a>
    
          <a href="" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-2xl font-medium">Aanbod</a>
        </div>
      </div>
    </nav>
  </header>
    <div class="container mx-auto mt-5 w-10/12">
    <section class="">
            <div class="flex flex-col text-center w-full mb-20">
                <h1 class="text-3xl font-medium">Hoofdpost</h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Lorem ipsum dolor sit amet, consectetur adipiscing
                    elit. Vivamus dictum posuere ligula, sed facilisis orci sollicitudin a. Duis viverra id odio sit
                    amet sagittis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus
                    mus. Aliquam a magna vel nunc sodales molestie. Morbi eu erat blandit, accumsan arcu quis, rhoncus
                    tellus. Curabitur luctus nisi eu ante bibendum aliquam id ut mi. Sed ornare accumsan porttitor. In
                    blandit euismod suscipit. Cras blandit consectetur risus eget vestibulum.</p>

            <?php for ($i = 0; $i < 3; $i++) : ?> 
                <div class="w-full h-2 bg-orange-500 rounded-md mt-5"></div>
                <h2 class="text-2xl">Onderwerp</h2>
                <div class="grid grid-cols-2 gap-4 ml-5 mt-5">
                    <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus dictum posuere ligula, sed facilisis orci sollicitudin a. Duis viverra id odio sit amet sagittis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam a magna vel nunc sodales molestie. Morbi eu erat blandit, accumsan arcu quis, rhoncus tellus. Curabitur luctus nisi eu ante bibendum aliquam id ut mi. Sed ornare accumsan porttitor. In blandit euismod suscipit. Cras blandit consectetur risus eget vestibulum.</p>
                    <div class="col-span-1">
                            <img src="../src/img/pexels-sebastian-coman-photography-3522790.jpg" class="h-96 w-auto rounded object-cover " alt="">
                    </div>
                </div>

            <?php endfor; ?>
            </div>
        </div>
    </section>


    <footer>
        <p>&copy; Copyright icon</p>
    </footer>
</body>

</html>

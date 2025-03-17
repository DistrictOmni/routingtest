<!DOCTYPE html>
<html lang="en" x-data="{ 
    openDropdown: null,   /* Single source for any open dropdown/drawer */
    currentStatus: 'Active'
  }" @keydown.escape.window="openDropdown = null"
>

<head>
    <meta charset="UTF-8" />
    <title><?= htmlspecialchars($title ?? 'Secured Area') ?></title> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Tailwind CSS (CDN) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" />

    <!-- Font Awesome (CDN) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    
</head>

<body class="bg-gray-100 text-gray-900">
<?php require __DIR__ . '/../../../../Views/GlobalFlashMessages.php'; ?>


    <!-- HEADER (fixed at top) -->
    <header class="fixed top-0 left-0 right-0 h-12 bg-gray-800 text-white z-50">
    <?php require_once 'Partials/GlobalSecuredHeader.php'; ?>
    </header>
    <!-- END HEADER -->

    

    <!-- ASIDE (Hidden on mobile, visible on sm+) -->
    <aside class="hidden sm:flex fixed top-12 bottom-0 left-0 w-20 bg-gray-800 z-40 flex-col items-center select-none overflow-auto">
   <?php require_once 'Partials/GlobalSecureAside/GlobalSecureAside.php'; ?>
        
    </aside>
    <!-- END ASIDE -->

    <!-- MAIN CONTENT -->
    <!-- On mobile (<sm), flush left; on sm+ offset by 20 (sidebar width) -->
    <main class="
      fixed top-12 bottom-0 
      left-0 sm:left-20
      right-0 overflow-auto bg-gray-50 
    ">
    <div
  class="fixed top-0 right-0 m-8 mt-12 p-3 text-xs font-mono text-white rounded-md flex flex-col bg-gray-700 sm:bg-pink-500 md:bg-orange-500 lg:bg-green-500 xl:bg-blue-500"
  style="min-width: 4rem;"
>
  <!-- Breakpoint indicators -->
  <div class="flex justify-center space-x-2">
    <div class="block  sm:hidden md:hidden lg:hidden xl:hidden">al</div>
    <div class="hidden sm:block  md:hidden lg:hidden xl:hidden">sm</div>
    <div class="hidden sm:hidden md:block  lg:hidden xl:hidden">md</div>
    <div class="hidden sm:hidden md:hidden lg:block  xl:hidden">lg</div>
    <div class="hidden sm:hidden md:hidden lg:hidden xl:block">xl</div>
  </div>

 
</div>



        <?= $content ?? 'Unable to display dashboard' ?>
    </main>

    <!-- AlpineJS -->
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>

</html>
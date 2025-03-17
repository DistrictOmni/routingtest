


<!DOCTYPE html>
<html lang="en" x-data="{ isPasswordVisible: false }">
<head>
  <meta charset="UTF-8" />
  <!-- Prevent zooming but allow scrolling -->
  <meta 
    name="viewport"
    content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" 
  />
  <title><?= htmlspecialchars($title) ?></title> 
  
  <!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com"></script>

<!-- Font Awesome Latest CDN -->
<link 
  rel="stylesheet" 
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 

/>
  
  <!-- Alpine.js (for interactivity) -->
  <script 
    src="https://cdn.jsdelivr.net/npm/alpinejs@3.11.1/dist/cdn.min.js" 
    defer
  ></script>
</head>
<body class="bg-gray-100">
<?php require __DIR__ . '/../../../../Views/GlobalFlashMessages.php'; ?>

<div class="fixed top-0 right-0 m-8 p-3 text-xs font-mono text-white h-6 w-6 rounded-full flex items-center justify-center bg-gray-700 sm:bg-pink-500 md:bg-orange-500 lg:bg-green-500 xl:bg-blue-500">
  <div class="block  sm:hidden md:hidden lg:hidden xl:hidden">al</div>
  <div class="hidden sm:block  md:hidden lg:hidden xl:hidden">sm</div>
  <div class="hidden sm:hidden md:block  lg:hidden xl:hidden">md</div>
  <div class="hidden sm:hidden md:hidden lg:block  xl:hidden">lg</div>
  <div class="hidden sm:hidden md:hidden lg:hidden xl:block">xl</div>
</div>


  <!-- HEADER (Fixed) -->
  <header class="fixed top-0 left-0 w-full bg-white shadow z-50">
    <div class="max-w-screen-xl mx-auto flex items-center justify-between py-4 px-4">
      <!-- Logo / Company Name -->
      <h1 class="text-xl font-bold text-indigo-600">
        My Company
      </h1>
    </div>
  </header>
  <!-- END HEADER -->

  <!-- MAIN CONTENT (Center between header and footer) -->
  <!-- Adjust pt-20 and pb-16 to match header/footer heights -->
  <main class="flex flex-col items-center justify-center min-h-screen pt-20 pb-16 relative z-0">
    
    <!--  CARD -->
    <div class="bg-white shadow-lg rounded-lg p-6 w-full max-w-md mx-4">
    <?php echo $content ?? ''; // Injected Content ?>

    </div>
    <!-- END LOGIN CARD -->

  </main>
  <!-- END MAIN CONTENT -->

  <!-- FOOTER (Fixed) -->
  <footer class="fixed bottom-0 left-0 w-full bg-white shadow z-50">
    <div class="max-w-screen-xl mx-auto py-2 px-4 flex items-center justify-center">
      <p class="text-gray-500 text-sm">&copy; 2023 My Company. All rights reserved.</p>
    </div>
  </footer>
  <!-- END FOOTER -->

</body>
</html>

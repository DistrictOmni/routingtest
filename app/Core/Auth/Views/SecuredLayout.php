<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? 'Secured Area') ?></title> 
    <!-- Use htmlspecialchars to prevent XSS attacks -->

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
</head>
<body class="bg-gray-100">
    <header class="bg-blue-600 text-white p-4">
        <h1 class="text-lg">Secured Dashboard</h1>
    </header>

    <main class="p-6">
        <?= $content ?? '' ?>
    </main>

    <footer class="text-center p-4 bg-gray-200">
        &copy; <?= date('Y') ?> Secured System. All rights reserved.
    </footer>
</body>
</html>

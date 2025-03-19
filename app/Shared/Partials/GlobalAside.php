<?php
if (isset($data) && is_array($data)) {
    extract($data);
}

// Alternatively, do this safely:
$accessibleModules = $data['accessibleModules'] ?? [];
?>

<!-- Example Sidebar Menu -->
<nav class="w-full">
    <ul class="flex flex-col text-white">
        <!-- Loop through the modules the user can access -->
        <?php if (!empty($accessibleModules)): ?>
            <?php foreach ($accessibleModules as $mod): ?>
                <!-- Build each menu item -->
                <li>
                    <div class="flex flex-col items-center justify-center w-full h-20
           p-3 border-l-4 border-transparent cursor-pointer
           text-gray-300 hover:bg-gray-700 hover:text-white
           hover:border-blue-400 transition-colors" aria-label="Admin Drawer">
    <i class="<?= htmlspecialchars($mod->fa_icon) ?> text-2xl"></i>
    <span class="text-sm mt-1"><?= htmlspecialchars($mod->name) ?></span>
  </div>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li class="px-4 py-2 text-gray-200 text-sm">
                No modules assigned.
            </li>
        <?php endif; ?>
    </ul>
</nav>

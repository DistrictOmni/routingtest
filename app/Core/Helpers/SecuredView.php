<?php

require_once __DIR__ . '/RenderView.php';

/**
 * Render a module-specific secured view using a common SecuredLayout.
 *
 * @param string $moduleName The module name (e.g., 'Students')
 * @param string $viewName   The view file name (e.g., 'DashboardView')
 * @param string $title      The page title
 * @param array  $data       Optional data to pass to the view
 */
function renderSecuredView(string $moduleName, string $viewName, string $title, array $data = [])
{
    // Define the path to the view inside the specific module
    $viewPath   = __DIR__ . "/../../Modules/{$moduleName}/Views/{$viewName}.php";
    
    // Define the common layout path for secured views
    $layoutPath = __DIR__ . "/../Auth/Views/SecuredLayout.php";

    // Merge title into data array
    $data['title'] = $title;

    // Call the universal render function
    renderView($viewPath, $layoutPath, $data);
}

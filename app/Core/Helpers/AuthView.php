<?php

require_once __DIR__ . '/RenderView.php';

/**
 * Render an Auth module view using AuthLayout
 *
 * @param string $viewName The name of the view file (e.g., 'LoginView')
 * @param array  $data     Optional data to pass to the view
 */
function renderAuthView(string $viewName, array $data = [])
{
    $viewPath   = __DIR__ . "/../Auth/Views/{$viewName}.php";
    $layoutPath = __DIR__ . "/../Auth/Views/AuthLayout.php";

    renderView($viewPath, $layoutPath, $data);
}

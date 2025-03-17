<?php
// app/Core/Helpers/SecuredCoreView.php

require_once __DIR__ . '/RenderView.php';

/**
 * Render a CORE Auth view using the SecuredLayout.
 *
 * @param string $viewName The name of the view file in app/Core/Auth/Views/ (e.g., 'LogoutView')
 * @param string $title    The page title.
 * @param array  $data     Optional data to pass to the view.
 */
function renderSecuredCoreView(string $viewName, string $title, array $data = [])
{
    $viewPath   = __DIR__ . "/../Auth/Views/{$viewName}.php";
    $layoutPath = __DIR__ . "/../Auth/Views/Secured/Layouts/SecuredLayout.php";

    $data['title'] = $title;
    renderView($viewPath, $layoutPath, $data);
}

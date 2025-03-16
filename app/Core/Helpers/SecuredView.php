<?php
// File: app/Core/Helpers/secured_view.php

require_once __DIR__ . '/RenderView.php';

/**
 * Render a Secured module view using SecuredLayout
 */
function renderSecuredView(string $viewName, array $data = [])
{
    $viewPath   = __DIR__ . "/../Secured/Views/{$viewName}.php";
    $layoutPath = __DIR__ . "/../Secured/Views/SecuredLayout.php";

    renderView($viewPath, $layoutPath, $data);
}

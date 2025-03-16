<?php
// File: app/Core/Helpers/view.php

/**
 * Render a view inside a layout (or standalone).
 *
 * @param string      $viewPath   Full path to the .php file (e.g. /path/to/view.php).
 * @param string|null $layoutPath (Optional) Full path to the layout file.
 * @param array       $data       Data to extract into the view.
 */
function renderView(string $viewPath, ?string $layoutPath = null, array $data = [])
{
    // Make $data variables available inside the view
    extract($data);

    // Start buffering the output of the included view
    ob_start();
    require $viewPath;
    // Get the HTML output from the view
    $content = ob_get_clean();

    // If a layout is specified, inject $content into it
    if ($layoutPath) {
        require $layoutPath;
    } else {
        // No layout -> just output the view content
        echo $content;
    }
}

<?php
// Ensure the session variables are set as arrays or objects are properly handled
$roles = isset($_SESSION['user_roles']) && $_SESSION['user_roles'] instanceof \Illuminate\Support\Collection 
    ? $_SESSION['user_roles']->toArray() 
    : (isset($_SESSION['user_roles']) ? $_SESSION['user_roles'] : []);

$modules = isset($_SESSION['user_modules']) ? $_SESSION['user_modules'] : [];
$permissions = isset($_SESSION['user_permissions']) ? $_SESSION['user_permissions'] : [];
?>
<h1>Dashboard</h1>

<h2>User Data:</h2>
<pre><?= print_r($user, true) ?></pre>

<h2>User Roles:</h2>
<ul>
    <?php
    // Ensure roles are an array
    if ($_SESSION['user_roles'] instanceof \Illuminate\Support\Collection) {
        $roles = $_SESSION['user_roles']->toArray();
    } else {
        $roles = $_SESSION['user_roles'] ?? [];
    }

    // Loop through roles and display them as a list
    foreach ($roles as $role) {
        // Check if the role is a string or an array, convert if necessary
        if (is_array($role)) {
            echo '<li>' . htmlspecialchars(implode(", ", $role)) . '</li>';
        } else {
            echo '<li>' . htmlspecialchars($role) . '</li>';
        }
    }
    ?>
</ul>

<h2>Modules:</h2>
<pre><?= print_r($modules, true) ?></pre>

<h2>Permissions:</h2>
<pre><?= print_r($permissions, true) ?></pre>

<h2>Cookies:</h2>
<pre><?= print_r($cookies, true) ?></pre>

<h2>Session Data:</h2>
<pre><?= print_r($sessionData, true) ?></pre>

<h2>DB Session Data:</h2>
<pre><?= print_r($dbSession, true) ?></pre>

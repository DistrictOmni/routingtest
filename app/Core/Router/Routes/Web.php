<?php

use App\Core\Router\Router;
use App\Core\Middleware\AuthMiddleware;
use App\Core\Auth\Controllers\AuthController;
use App\Core\Auth\Services\AuthService;
use App\Core\Database\Database;

use App\Core\Auth\Models\Role;

use App\Core\Auth\Models\User;
use App\Modules\Admin\District\Models\District;

/**
 * Web Route Definitions
 * /app/Core/Router/Routes/Web.php
 */


// Helpers for rendering views
require_once __DIR__ . '/../../Helpers/AuthView.php';
require_once __DIR__ . '/../../Helpers/SecuredView.php';
require_once __DIR__ . '/../../Helpers/SecuredCoreView.php';

return function (Router $router) {
    $database = new Database(); // Create the Database instance
    $authService = new AuthService($database); // Pass the Database instance to AuthService
    $authController = new AuthController($authService, $database); // Pass both AuthService and Database to AuthController

    $router->get('/', function () {
        // If the user is logged in, go to dashboard. Otherwise, go to login.
        if (!empty($_COOKIE['token'])) {
            try {
                // Attempt to validate the token. 
                // If valid, AuthMiddleware::handle() returns the User; 
                // if invalid, it redirects to /auth/login
                $user = AuthMiddleware::handle();
                // If we reach here, the token was valid
                header("Location: /dashboard");
                exit;
            } catch (\Exception $e) {
                // If there's an error decoding or verifying
                header("Location: /auth/login");
                exit;
            }
        } else {
            // If no cookie at all, definitely not logged in
            header("Location: /auth/login");
            exit;
        }
    });

    $router->get('/dashboard', function () {
        // Ensure session is started.
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Get the authenticated user via your middleware.
        $user = \App\Core\Middleware\AuthMiddleware::handle();

        // Gather debugging data.
        $cookies = $_COOKIE;
        $sessionData = $_SESSION;

        // Retrieve the JWT token from the cookie.
        $token = $_COOKIE['token'] ?? null;
        $dbSession = null;
        if ($token) {
            try {
                // Decode the token to get the jti.
                $decoded = \Firebase\JWT\JWT::decode($token, new \Firebase\JWT\Key('your_secret_key', 'HS256'));
                $jti = $decoded->jti;
                // Look up the session record using Eloquent.
                $dbSession = \App\Core\Auth\Models\Session::where('jti', $jti)->first();
            } catch (\Exception $e) {
                $dbSession = "Invalid token: " . $e->getMessage();
            }
        }

        // Package all data into an array.
        $data = [
            'user' => $user ? $user->toArray() : null,
            'cookies' => $cookies,
            'sessionData' => $sessionData,
            'dbSession' => $dbSession ? (is_object($dbSession) ? $dbSession->toArray() : $dbSession) : null,
        ];

        // Pass the data array to your secured view.
        renderSecuredView('Dashboard', 'DashboardView', 'Dashboard', $data);
    });





    /*************************************************
     * AUTHENTICATION & AUTHORIZATION ROUTES
     *************************************************/
    
    // Handle the login GET request
    $router->get('/auth/login', function () {
        // Check if the user is already logged in (via session or cookie)
        if (isset($_COOKIE['token']) || isset($_SESSION['user_id'])) {
            // If already logged in, redirect to the dashboard
            header('Location: /dashboard');
            exit;
        }

        // Otherwise, render the login page
        renderAuthView('LoginView', 'Login Page');
    });

// Handle the login POST request
$router->post('/auth/login', function () {
    // Correct the instantiation to include both the AuthService and Database
    $database = new Database(); // Create the Database instance
    $authService = new AuthService($database); // Pass the Database instance to AuthService
    $authController = new AuthController($authService, $database); // Pass both AuthService and Database to AuthController

    $authController->attemptLogin(); // Handle the form submission
});


    // Logout route (Could call a controller method or simply show a view)
    $router->get('/auth/logout', function () {
        // Show a "Logged out" page or redirect to login
        renderAuthView('LoginView', 'Logout');
    });

    /**
     * GET /admin/auth/users
     * Show a paginated list of all system users.
     */
    $router->get('/admin/auth/users', function () {
        // 1) (Optional) Check user permissions or roles if needed.
        //    e.g., only admin or super-admin can view users.
    
        // 2) Retrieve pagination parameters from query string (?page=2&per_page=25, etc.).
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $perPage = isset($_GET['per_page']) ? (int) $_GET['per_page'] : 25;
    
        // 3) Use Eloquent (or your ORM) to fetch paginated users.
        //    For example, assuming you have a User model:
        $users = User::paginate($perPage, ['*'], 'page', $page);
    
        // 4) Prepare data for the view/template.
        $data = [
            'users'        => $users,
            'currentPage'  => $users->currentPage(),
            'totalPages'   => $users->lastPage(),
            // etc. if you want them explicitly
        ];
    
        // 5) Render your secured layout/view (e.g. AllUsersView.php) with the data.
        renderSecuredCoreView('AllUsersView', 'User Management', $data);
    });
    
    /**
     * GET /admin/auth/roles
     * Show a paginated list of all roles in the system.
     */
    $router->get('/admin/auth/roles', function () {
        // 1) (Optional) Check user permissions.
    
        // 2) Retrieve pagination parameters from query string.
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $perPage = isset($_GET['per_page']) ? (int) $_GET['per_page'] : 25;
    
        // 3) Fetch roles from the database (with optional relationships).
        $roles = Role::paginate($perPage, ['*'], 'page', $page);
        // $roles->load('permissions'); // Example if you want to eager-load relationships.
    
        // 4) Prepare data for the view/template.
        $data = [
            'roles'        => $roles,
            'currentPage'  => $roles->currentPage(),
            'totalPages'   => $roles->lastPage(),
        ];
    
        // 5) Render a secured layout/view for roles (e.g. AllRolesView.php).
        renderSecuredCoreView('AllRolesView', 'Role Management', $data);
    });
    
    
    /*************************************************
     * DISTRICT MANAGEMENT ROUTES
     *************************************************/
    /**
     * Below are example routes for managing “District” resources
     * within an admin context. Adjust naming or folder structure
     * to match your actual app.
     */
    

    /**
     * GET /admin/districts
     * List or paginate all districts in the system.
     */
    $router->get('/admin/districts', function () {
        // Ensure session is started.
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    
        // Get the authenticated user via your middleware.
        $user = \App\Core\Middleware\AuthMiddleware::handle();
    
        // Gather debugging data (cookies, session, etc.).
        $cookies = $_COOKIE;
        $sessionData = $_SESSION;
    
        // Retrieve the JWT token from the cookie.
        $token = $_COOKIE['token'] ?? null;
        $dbSession = null;
        if ($token) {
            try {
                // Decode the token to get the jti.
                $decoded = \Firebase\JWT\JWT::decode($token, new \Firebase\JWT\Key('your_secret_key', 'HS256'));
                $jti = $decoded->jti;
    
                // Look up the session record using Eloquent.
                $dbSession = \App\Core\Auth\Models\Session::where('jti', $jti)->first();
            } catch (\Exception $e) {
                $dbSession = "Invalid token: " . $e->getMessage();
            }
        }
    
        // Retrieve all districts (or paginate if preferred).
        $districts = \App\Modules\Admin\District\Models\District::all();
        // Or: $districts = \App\Models\District::paginate(25);
    
        // Package all data into an array.
        $data = [
            'user'        => $user ? $user->toArray() : null,
            'cookies'     => $cookies,
            'sessionData' => $sessionData,
            'dbSession'   => $dbSession ? (is_object($dbSession) ? $dbSession->toArray() : $dbSession) : null,
            'districts'   => $districts->toArray(),
        ];
    
        // Render the secured view for listing all districts.
        //  - "AllDistricts" is the Title bar text
        //  - "AllDistrictsView" is the template name
        //  - "District Management" is the sub-header or meta info
        renderSecuredView('Admin/District/', 'AllDistrictsView', 'District Management', $data);
    });
    
    
    
    /**
     * GET /admin/districts/{id}/edit
     * Show a form to edit an existing District.
     */
    $router->get('/admin/districts/(\d+)/edit', function ($districtId) {
        // 1) Find the District by ID.
        $district = District::findOrFail($districtId);
    
        // 2) Render a view with existing district data.
        renderSecuredCoreView('EditDistrictView', 'Edit District', [
            'district' => $district
        ]);
    });

    /**
 * GET /admin/districts/{id}
 * Show a non-edit (read-only) view of the District profile.
 */
$router->get('/admin/districts/(\d+)', function ($districtId) {
    // 1) Find the District by ID.
    $district = District::findOrFail($districtId);

    // 2) Render a read-only view for the District profile.
    //    For example, "ShowDistrictView" might display fields without providing form inputs.
    renderSecuredCoreView('ShowDistrictView', 'District Profile', [
        'district' => $district
    ]);
});

    
    /**
     * POST (or PUT) /admin/districts/{id}
     * Process the update for an existing District.
     */
    $router->post('/admin/districts/(\d+)', function ($districtId) {
        // 1) Fetch the District and update fields.
        $district = District::findOrFail($districtId);
        $district->name = $_POST['name'] ?? $district->name;
        // ... update other fields ...
        $district->save();
    
        // 2) Redirect or show success message.
        header('Location: /admin/districts');
        exit;
    });
    
    




















/*********************************************************
 * APPLICATION SETTINGS ROUTES (Just views for now)
 *********************************************************/

/**
 * 1) OVERVIEW
 */
// Application Overview
$router->get('/admin/application/overview', function () {
    // Render a view: ApplicationOverviewView
    renderSecuredView('Admin/Application/', 'ApplicationOverviewView', 'Application Overview');
});

// License Management
$router->get('/admin/application/license-management', function () {
    renderSecuredView('Admin/Application/', 'ApplicationLicenseView', 'License Management');
});

// App Integration Status
$router->get('/admin/application/integration-status', function () {
    renderSecuredView('Admin/Application/', 'ApplicationIntegrationStatusView', 'Integration Status');
});

// System Health Monitor
$router->get('/admin/application/system-health-monitor', function () {
    renderSecuredView('Admin/Application/', 'ApplicationHealthMonitorView', 'System Health Monitor');
});

// Update Manager
$router->get('/admin/application/update-manager', function () {
    renderSecuredView('Admin/Application/', 'ApplicationUpdateManagerView', 'Update Manager');
});


/**
 * 2) EMAIL & COMMUNICATIONS
 */
// Email Gateway Setup
$router->get('/admin/application/email/gateway-setup', function () {
    renderSecuredView('Admin/Application/', 'EmailGatewaySetupView', 'Email Gateway Setup');
});

// Domain Verification
$router->get('/admin/application/email/domain-verification', function () {
    renderSecuredView('Admin/Application/', 'DomainVerificationView', 'Email & Communications');
});

// Outbound Email Policies
$router->get('/admin/application/email/outbound-policies', function () {
    renderSecuredView('Admin/Application/', 'OutboundEmailPoliciesView', 'Email & Communications');
});

// Email Template Editor
$router->get('/admin/application/email/template-editor', function () {
    renderSecuredView('Admin/Application/', 'EmailTemplateEditorView', 'Email & Communications');
});

// Mass Email Tools
$router->get('/admin/application/email/mass-tools', function () {
    renderSecuredView('Admin/Application/', 'MassEmailToolsView', 'Email & Communications');
});

// Bounce & Spam Tracking
$router->get('/admin/application/email/bounce-tracking', function () {
    renderSecuredView('Admin/Application/', 'BounceSpamTrackingView', 'Email & Communications');
});

// Notification Preferences
$router->get('/admin/application/email/notification-preferences', function () {
    renderSecuredView('Admin/Application/', 'NotificationPreferencesView', 'Email & Communications');
});


/**
 * 3) INTEGRATIONS
 */
// Single Sign-On (SSO)
$router->get('/admin/application/integrations/sso', function () {
    renderSecuredView('Admin/Application/', 'SsoIntegrationView', 'Integrations');
});

// LTI/SCORM Integration
$router->get('/admin/application/integrations/lti-scorm', function () {
    renderSecuredView('Admin/Application/', 'LtiScormIntegrationView', 'Integrations');
});

// OAuth & API Keys
$router->get('/admin/application/integrations/oauth-keys', function () {
    renderSecuredView('Admin/Application/', 'OauthKeysView', 'Integrations');
});

// Data Synchronization
$router->get('/admin/application/integrations/data-synchronization', function () {
    renderSecuredView('Admin/Application/', 'DataSyncView', 'Integrations');
});

// Custom App Store
$router->get('/admin/application/integrations/custom-store', function () {
    renderSecuredView('Admin/Application/', 'CustomAppStoreView', 'Integrations');
});


/**
 * 4) SECURITY
 */
// App Whitelisting/Blacklisting
$router->get('/admin/application/security/whitelist-blacklist', function () {
    renderSecuredView('Admin/Application/', 'AppWhitelistBlacklistView', 'Security');
});

// Audit Logs
$router->get('/admin/application/security/audit-logs', function () {
    renderSecuredView('Admin/Application/', 'AuditLogsView', 'Security');
});

// Data Privacy Settings
$router->get('/admin/application/security/privacy-settings', function () {
    renderSecuredView('Admin/Application/', 'PrivacySettingsView', 'Security');
});

// Encryption Policies
$router->get('/admin/application/security/encryption-policies', function () {
    renderSecuredView('Admin/Application/', 'EncryptionPoliciesView', 'Security');
});

// Vendor Risk Management
$router->get('/admin/application/security/vendor-risk', function () {
    renderSecuredView('Admin/Application/', 'VendorRiskView', 'Security');
});

// Consent Management
$router->get('/admin/application/security/consent-management', function () {
    renderSecuredView('Admin/Application/', 'ConsentManagementView', 'Security');
});

// Error & Exception Tracking
$router->get('/admin/application/security/error-tracking', function () {
    renderSecuredView('Admin/Application/', 'ErrorTrackingView', 'Security');
});

// Trend Analysis
$router->get('/admin/application/security/trend-analysis', function () {
    renderSecuredView('Admin/Application/', 'TrendAnalysisView', 'Security');
});

};

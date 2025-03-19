<?php
namespace App\Modules\Auth\Controllers;

use App\Modules\Auth\Models\User;
use App\Modules\Auth\Services\JWTService;
use Exception;

class AuthController
{
    // Define the log file location in the same directory
    // You can define the log file path here
    const LOG_FILE = __DIR__ . '/auth_log.txt';

    // Custom log function
    private function logMessage($message)
    {
        $timestamp = date('Y-m-d H:i:s');
        $formattedMessage = "[$timestamp] $message" . PHP_EOL;

        // Append the message to the log file
        file_put_contents(self::LOG_FILE, $formattedMessage, FILE_APPEND);
    }

    // Show the login form with a dynamic layout and data
    public function showLoginForm()
    {
        $this->logMessage("Entering showLoginForm method");
    
        // Check if the user is already logged in
        if (isset($_SESSION['user_id'])) {
            // Redirect to the intended URL or default destination if already logged in
            $destination = $_SESSION['intended_url'] ?? '/dashboard'; // Adjust accordingly
            $this->logMessage("User already logged in, redirecting to: $destination");
    
            // To prevent infinite redirects, only redirect if not already on the intended page
            if ($_SERVER['REQUEST_URI'] !== $destination) {
                header("Location: $destination");
                exit;
            }
        }
    
        // If not logged in, proceed with rendering the login form
        $data = [
            'title' => 'Login',
            'message' => 'Please login to your account',
        ];
    
        $this->logMessage("Rendering view with title: " . $data['title']);
        return $this->renderView('Login', 'AuthLayout', 'Login', $data);
    }

    public function logout()
{
    // Start session if not already started
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Clear session data
    session_unset();
    session_destroy();

    // Redirect to the login page
    header("Location: /auth/login");
    exit;
}

    
    

    // Method to render views with a dynamic layout and data
    protected function renderView(string $view, string $layout, string $title, array $data = [])
    {
        $this->logMessage("Rendering view: $view with layout: $layout");

        // Get the content of the specific view
        ob_start();
        include __DIR__ . '/../Views/' . $view . '.php';  // This assumes the path to the views is correct
        $content = ob_get_clean();

        // Inject the content into the layout
        $data['content'] = $content;  // Make sure 'content' is available in the layout

        // Include the layout, passing the $data array (which contains 'title', 'message', etc.)
        include __DIR__ . '/../../../Shared/Layouts/' . $layout . '.php';

        $this->logMessage("Rendering completed for view: $view");
        $this->logMessage("Session after render: " . print_r($_SESSION, true));

    }


    public function processLogin()
{
    $this->logMessage("Entering processLogin method");
    $this->logMessage("Session before redirect: " . print_r($_SESSION, true));

    // Get POST data (could be validated using a more robust framework request)
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;

    $this->logMessage("Received email: $email");

    // Basic validation
    if (!$email || !$password) {
        $this->logMessage("Error: Email or password is missing");
        setFlashMessage('error', 'Email and password are required.');
        
        // For API request, return JSON response
        if ($this->isApiRequest()) {
            return $this->respondWithJson(['error' => 'Email and password are required.'], 400);
        }

        // For web request, redirect to login
        header('Location: /auth/login');
        exit;
    }

    // Attempt to authenticate the user
    $user = User::authenticate($email, $password);

    if ($user) {
        $this->logMessage("User authenticated successfully: " . $user->email);

        // Web login (session) response
        if (!$this->isApiRequest()) {
            // Start session if not already started
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            // Store user ID in session
            $_SESSION['user_id'] = $user->id;

            $this->logMessage("User ID stored in session: " . $user->id);
            $this->logMessage("Session after storing user id right before redirect: " . print_r($_SESSION, true));

            // Redirect to the intended URL or dashboard
            $destination = $_SESSION['intended_url'] ?? '/dashboard';
            unset($_SESSION['intended_url']);
            $this->logMessage("Redirecting to: $destination");
            header("Location: $destination");
            exit;
        }

        // API login (JWT) response
        $token = JWTService::generateToken($user);
        $this->logMessage("JWT Token generated for user: " . $user->email);

        return $this->respondWithJson([
            'user' => $user,
            'token' => $token,
        ]);
    }

    // Authentication failed
    $this->logMessage("Error: Authentication failed for email: $email");
    return $this->respondWithJson(['error' => 'Unauthorized'], 401);
}

    private function isApiRequest(): bool
    {
        return isset($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false;
    }

    private function respondWithJson($data, $status = 200)
    {
        header('Content-Type: application/json');
        http_response_code($status);
        echo json_encode($data);
        exit;
    }
}

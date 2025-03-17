<?php
// File: AuthControllerTest.php

namespace App\Core\Auth\Controllers;

use PHPUnit\Framework\TestCase;
use App\Core\Auth\Services\AuthService;
use Exception;

/**
 * Custom exception to simulate terminate() calls.
 */
class ExitException extends Exception {}

/**
 * TestHelper collects calls made to built-in functions.
 */
class TestHelper {
    public static $headerCalls = [];
    public static $setcookieCalls = [];
    public static $httpResponseCode = null;
    public static $flashMessages = [];

    public static function reset() {
        self::$headerCalls = [];
        self::$setcookieCalls = [];
        self::$httpResponseCode = null;
        self::$flashMessages = [];
    }
}

/**
 * Override the global functions in this namespace so we can capture their calls.
 */
function header($string, $replace = true, $http_response_code = null) {
    TestHelper::$headerCalls[] = $string;
    if ($http_response_code !== null) {
        TestHelper::$httpResponseCode = $http_response_code;
    }
}

function setcookie($name, $value, $expire, $path, $domain = '', $secure = false, $httponly = false) {
    TestHelper::$setcookieCalls[] = [
        'name'      => $name,
        'value'     => $value,
        'expire'    => $expire,
        'path'      => $path,
        'domain'    => $domain,
        'secure'    => $secure,
        'httponly'  => $httponly,
    ];
    return true;
}

function http_response_code($code = null) {
    if ($code !== null) {
        TestHelper::$httpResponseCode = $code;
    }
    return TestHelper::$httpResponseCode;
}

/**
 * A stub for setFlashMessage used in AuthController.
 */
function setFlashMessage($type, $message) {
    TestHelper::$flashMessages[] = [
        'type'    => $type,
        'message' => $message,
    ];
}

/**
 * TestableAuthController extends your real AuthController and overrides the terminate() method.
 * Your real AuthController should call $this->terminate() instead of exit().
 */
class TestableAuthController extends AuthController {
    protected function terminate($status = 0)
    {
        throw new ExitException("Terminate called with status " . $status);
    }
}

/**
 * PHPUnit test cases for AuthController::attemptLogin().
 */
class AuthControllerTest extends TestCase {

    protected function setUp(): void {
        // Reset helper and globals before each test.
        TestHelper::reset();
        $_POST = [];
        $_SERVER = [];
    }

    public function testAttemptLoginWithValidCredentials() {
        // Simulate valid POST and SERVER data.
        $_POST['email'] = 'test@example.com';
        $_POST['password'] = 'password';
        $_SERVER['HTTP_USER_AGENT'] = 'TestAgent';
        $_SERVER['REMOTE_ADDR'] = '127.0.0.1';

        // Create a mock for AuthService that returns a token and expiration.
        $authService = $this->createMock(AuthService::class);
        $tokenData = [
            'token'      => 'fake.jwt.token',
            'expires_at' => time() + 3600,
        ];

        $authService->expects($this->once())
            ->method('attemptLogin')
            ->with(
                $this->equalTo('test@example.com'),
                $this->equalTo('password'),
                $this->equalTo('TestAgent'),
                $this->equalTo('127.0.0.1')
            )
            ->willReturn($tokenData);

        $controller = new TestableAuthController($authService);

        try {
            $controller->attemptLogin();
            $this->fail("Expected terminate() to be called.");
        } catch (ExitException $e) {
            // Expected terminate() call.
        }

        // Assert setcookie was called with the correct parameters.
        $this->assertNotEmpty(TestHelper::$setcookieCalls, "setcookie was not called.");
        $cookieCall = TestHelper::$setcookieCalls[0];
        $this->assertEquals('token', $cookieCall['name']);
        $this->assertEquals($tokenData['token'], $cookieCall['value']);
        $this->assertEquals($tokenData['expires_at'], $cookieCall['expire']);
        $this->assertEquals('/', $cookieCall['path']);
        $this->assertTrue($cookieCall['secure']);
        $this->assertTrue($cookieCall['httponly']);

        // Assert header() was called with a redirect to /dashboard.
        $this->assertNotEmpty(TestHelper::$headerCalls, "header() was not called.");
        $this->assertEquals('Location: /dashboard', TestHelper::$headerCalls[0]);

        // Optionally assert the HTTP response code is acceptable (200, 302, or null if not explicitly set).
        $this->assertTrue(
            TestHelper::$httpResponseCode === 200 ||
            TestHelper::$httpResponseCode === 302 ||
            TestHelper::$httpResponseCode === null,
            "Unexpected HTTP response code: " . TestHelper::$httpResponseCode
        );
    }

    public function testAttemptLoginWithMissingEmail() {
        // Simulate missing email with password provided.
        $_POST['password'] = 'password';

        // Create a mock for AuthService that should not be called.
        $authService = $this->createMock(AuthService::class);
        $authService->expects($this->never())
            ->method('attemptLogin');

        $controller = new TestableAuthController($authService);

        // Capture output to verify the error message.
        ob_start();
        try {
            $controller->attemptLogin();
            $this->fail("Expected terminate() to be called.");
        } catch (ExitException $e) {
            // Expected terminate() call.
        }
        $output = ob_get_clean();

        $this->assertEquals(400, TestHelper::$httpResponseCode, "HTTP response code should be 400.");
        $this->assertStringContainsString("Email and password are required.", $output);
    }

    public function testAttemptLoginWithMissingPassword() {
        // Simulate missing password with email provided.
        $_POST['email'] = 'test@example.com';

        // Create a mock for AuthService that should not be called.
        $authService = $this->createMock(AuthService::class);
        $authService->expects($this->never())
            ->method('attemptLogin');

        $controller = new TestableAuthController($authService);

        // Capture output to verify the error message.
        ob_start();
        try {
            $controller->attemptLogin();
            $this->fail("Expected terminate() to be called.");
        } catch (ExitException $e) {
            // Expected terminate() call.
        }
        $output = ob_get_clean();

        $this->assertEquals(400, TestHelper::$httpResponseCode, "HTTP response code should be 400.");
        $this->assertStringContainsString("Email and password are required.", $output);
    }

    public function testAttemptLoginWithInvalidCredentials() {
        // Simulate valid POST data but wrong credentials.
        $_POST['email'] = 'test@example.com';
        $_POST['password'] = 'wrongpassword';
        $_SERVER['HTTP_USER_AGENT'] = 'TestAgent';
        $_SERVER['REMOTE_ADDR'] = '127.0.0.1';

        // Create a mock for AuthService that throws an exception for invalid credentials.
        $authService = $this->createMock(AuthService::class);
        $authService->expects($this->once())
            ->method('attemptLogin')
            ->will($this->throwException(new Exception("Incorrect email or password.")));

        $controller = new TestableAuthController($authService);

        // Capture output to check flash message and redirect.
        ob_start();
        try {
            $controller->attemptLogin();
            $this->fail("Expected terminate() to be called.");
        } catch (ExitException $e) {
            // Expected terminate() call.
        }
        $output = ob_get_clean();

        $this->assertEquals(401, TestHelper::$httpResponseCode, "HTTP response code should be 401.");
        $this->assertNotEmpty(TestHelper::$flashMessages, "Flash message was not set.");
        $flash = TestHelper::$flashMessages[0];
        $this->assertEquals('error', $flash['type']);
        $this->assertStringContainsString("Incorrect email or password.", $flash['message']);

        // Assert that header() was called to redirect to /auth/login.
        $this->assertNotEmpty(TestHelper::$headerCalls, "header() was not called.");
        $this->assertEquals('Location: /auth/login', TestHelper::$headerCalls[0]);
    }

    public function testAttemptLoginWhenAuthServiceThrowsGeneralException() {
        // Simulate valid POST data.
        $_POST['email'] = 'test@example.com';
        $_POST['password'] = 'password';
        $_SERVER['HTTP_USER_AGENT'] = 'TestAgent';
        $_SERVER['REMOTE_ADDR'] = '127.0.0.1';

        // Create a mock for AuthService that throws a generic exception.
        $authService = $this->createMock(AuthService::class);
        $authService->expects($this->once())
            ->method('attemptLogin')
            ->will($this->throwException(new Exception("Something went wrong.")));

        $controller = new TestableAuthController($authService);

        // Capture output.
        ob_start();
        try {
            $controller->attemptLogin();
            $this->fail("Expected terminate() to be called.");
        } catch (ExitException $e) {
            // Expected terminate() call.
        }
        $output = ob_get_clean();

        $this->assertEquals(401, TestHelper::$httpResponseCode, "HTTP response code should be 401.");
        $this->assertNotEmpty(TestHelper::$flashMessages, "Flash message was not set.");
        $flash = TestHelper::$flashMessages[0];
        $this->assertEquals('error', $flash['type']);
        $this->assertStringContainsString("Something went wrong.", $flash['message']);

        // Assert that header() was called to redirect to /auth/login.
        $this->assertNotEmpty(TestHelper::$headerCalls, "header() was not called.");
        $this->assertEquals('Location: /auth/login', TestHelper::$headerCalls[0]);
    }
}

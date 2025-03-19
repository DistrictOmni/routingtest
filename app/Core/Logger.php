<?php
namespace App\Core;
class Logger
{
    /**
     * We’ll build the path in initLogFile(), so let’s store it here.
     */
    private static $logFile;

    /**
     * Cache of the environment (production or development).
     */
    private static $env;

    /**
     * Static initialization: build the log file path one level above __DIR__.
     * E.g. if this file lives in C:\xampp\htdocs\app\Core\, then the logs
     * directory will be C:\xampp\htdocs\app\logs, and the file is app.log.
     */
    private static function initLogFile(): void
    {
        if (!isset(self::$logFile)) {
            // Go one level up from this file’s directory
            $parentDir = dirname(__DIR__); // e.g. C:\xampp\htdocs\app
            
            // Construct the logs directory path
            $logDir = $parentDir . DIRECTORY_SEPARATOR . '../logs'; // e.g. C:\xampp\htdocs\app\logs
            
            // Construct the final file path
            self::$logFile = $logDir . DIRECTORY_SEPARATOR . 'app.log';
        }
    }

    /**
     * Log a DEBUG message.
     */
    public static function debug(string $message): void
    {
        if (self::getEnv() !== 'production') {
            self::writeLog('DEBUG', $message);
        }
    }

    /**
     * Log an INFO message.
     */
    public static function info(string $message): void
    {
        if (self::getEnv() !== 'production') {
            self::writeLog('INFO', $message);
        }
    }

    /**
     * Log a WARNING message.
     */
    public static function warning(string $message): void
    {
        if (self::getEnv() !== 'production') {
            self::writeLog('WARNING', $message);
        }
    }

    /**
     * Log an ERROR message (always logged).
     */
    public static function error(string $message): void
    {
        self::writeLog('ERROR', $message);
    }

    /**
     * Internal method to write a formatted log message to file.
     * This attempts to create the logs directory if it doesn’t exist.
     */
    private static function writeLog(string $level, string $message): void
    {
        // Ensure we have built the log file path
        self::initLogFile();

        $timestamp = date('Y-m-d H:i:s');
        $formattedMessage = "[$timestamp] [$level] $message" . PHP_EOL;

        // Grab the directory portion of the log file
        $logDir = dirname(self::$logFile);

        // Optional debug: echo the path we’re trying to use (helps you debug)
        // echo "GlobalLogger trying to log to: " . self::$logFile . "<br>";

        // Ensure the directory exists (or try creating it)
        if (!is_dir($logDir)) {
            if (!mkdir($logDir, 0777, true)) {
                echo "ERROR: Unable to create log directory: $logDir" . PHP_EOL;
                return;
            }
        }

        // Attempt to write to the log file
        $result = @file_put_contents(self::$logFile, $formattedMessage, FILE_APPEND);
        if ($result === false) {
            echo "ERROR: Unable to write to log file: " . self::$logFile . PHP_EOL;
        }
    }

    /**
     * Determine if we’re in production or development mode.
     * Defaults to 'development' if APP_ENV is not set.
     */
    private static function getEnv(): string
    {
        if (self::$env === null) {
            self::$env = getenv('APP_ENV') ?: 'development';
        }
        return self::$env;
    }
}

<?php

namespace App\Core\Database;

use Illuminate\Database\Capsule\Manager as Capsule;

class Database
{
    protected Capsule $capsule;

    public function __construct()
    {
        $this->capsule = new Capsule;

        $this->capsule->addConnection([
            'driver'    => 'mysql',  // Change this to your database driver (mysql, sqlite, pgsql, etc.)
            'host'      => '127.0.0.1',
            'database'  => 'prod',
            'username'  => 'root',
            'password'  => '',
            'charset'   => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix'    => '',
        ]);

        // Make this Capsule instance available globally
        $this->capsule->setAsGlobal();
        $this->capsule->bootEloquent();
    }

    public function getCapsule(): Capsule
    {
        return $this->capsule;
    }
}

<?php

namespace App\Core\Auth\Controllers;
// Example snippet of how you might retrieve users in a controller (Laravel style).
use App\Core\Auth\Models\User;




class UserController
{
    $users = User::query()
    ->with('roles') // if you have a roles relationship
    ->paginate(25); // or use DataTables, or some advanced method

// Pass $users to the view
return view('app.Core.Auth.Views.AllUsersView', [
    'users' => $users,
]);
}   
<?php

namespace App\Admin\Controllers;

use Encore\Admin\Controllers\AuthController as BaseAuthController;
use Encore\Admin\Facades\Admin;
use Illuminate\Http\Request;

class AuthController extends BaseAuthController
{
    protected $loginView = 'admin/login';

    protected function username()
    {
        return 'email';
    }

    protected function guard()
    {
        return Admin::guard();
    }
}

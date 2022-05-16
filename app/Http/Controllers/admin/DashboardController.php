<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return View('admin.dashboard');
    }

}

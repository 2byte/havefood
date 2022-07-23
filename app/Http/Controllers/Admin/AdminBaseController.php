<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class AdminBaseController extends Controller
{
    function __construct()
    {
        parent::__construct();
        
        Inertia::setRootView(resources_path('views/admin/admin_app.blade.php'));
    }
}
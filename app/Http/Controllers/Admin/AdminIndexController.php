<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;

class AdminIndexController extends AdminBaseController
{
    //
    public function index(Request $request)
    {
        //Inertia::setRootView('admin.admin_app.blade.php');

        return Inertia::render('HomeView');
    }
}

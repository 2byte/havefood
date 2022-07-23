<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;

class AdminIndexController extends Controller
{
    //
    public function index(Request $request)
    {
        return Inertia::render('Admin/Index');
    }
}

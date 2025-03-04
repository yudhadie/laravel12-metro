<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard',[
            'title' => 'Dashboard',
            'breadcrumbs' => Breadcrumbs::render('dashboard'),
        ]);
    }
}

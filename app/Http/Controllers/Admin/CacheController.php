<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class CacheController extends Controller
{
    public function optimize()
    {
        Artisan::call('optimize');

        return redirect()->route('dashboard')->with('success', 'Cache berhasil dioptimasi!');
    }

    public function clearCache()
    {
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        Artisan::call('config:clear');

        return redirect()->route('dashboard')->with('success', 'Cache telah dibersihkan!');
    }
}

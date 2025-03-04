<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\TestData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebsiteController extends Controller
{
    public function home()
    {
        return view('web.home',[
            'title' => 'Home',
        ]);
    }

    public function profile()
    {
        $data = Auth::user();

        return view('web.profile',[
            'title' => 'Profile',
            'data' => $data,
        ]);
    }

    public function test()
    {
        return view('web.test',[
            'title' => 'Test Data',
        ]);
    }

    public function api_test()
    {
        $data = TestData::query();

        return datatables()->of($data)
        ->addIndexColumn()
        ->addColumn('photo', fn($data) => $data->photo)
        ->toJson();
    }
}

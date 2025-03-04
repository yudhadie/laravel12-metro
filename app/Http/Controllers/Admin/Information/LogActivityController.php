<?php

namespace App\Http\Controllers\Admin\Information;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Illuminate\Http\Request;

class LogActivityController extends Controller
{
    public function index()
    {
        return view('admin.information.activity.index',[
            'title' => 'Activity',
            'breadcrumbs' => Breadcrumbs::render('activity'),
        ]);
    }

    public function show($id)
    {
        $data = Activity::FindorFail($id);

        return view('admin.information.activity.show',[
            'title' => 'Detail Activity',
            'subtitle' => 'Aktivitas user dalam aplikasi',
            'breadcrumbs' => Breadcrumbs::render('activity.show',$data),
            'data' => $data,
            'properties' => json_decode($data->properties),
        ]);
    }

    public function data()
    {
        $data = Activity::query()
            ->with('user')
            ->select('id', 'log_name', 'description', 'subject_id', 'event', 'causer_id', 'created_at');

        return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('user', fn($data) => $data->causer_id ? $data->user->name : '-')
            ->addColumn('time', fn($data) => $data->created_at->diffForHumans())
            ->make(true);
    }
}

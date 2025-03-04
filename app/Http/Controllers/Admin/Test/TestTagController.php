<?php

namespace App\Http\Controllers\Admin\Test;

use App\Http\Controllers\Controller;
use App\Models\TestTag;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Illuminate\Http\Request;

class TestTagController extends Controller
{
    public function index()
    {
        return view('admin.test.tag.index',[
            'title' => 'Test Data',
            'breadcrumbs' => Breadcrumbs::render('test'),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:test_data',
        ]);

        $data =  new TestTag();
        $data->name = $request->name;
        $data->save();

        return redirect()->back()->with('success', 'Data berhasil diupdate');
    }

    public function show($id)
    {
        $data = TestTag::findOrFail($id);

        return response()->json($data);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|unique:test_data,name,'.$id,
        ]);

        $data = TestTag::FindOrFail($id);
        $data->update([
            'name' => $request->name,
        ]);

        return response()->json(['message' => 'Data berhasil diperbarui!']);
    }

    public function destroy(string $id)
    {
        $data = TestTag::find($id);
        $data->delete();
    }

    public function data()
    {
        $data = TestTag::query()
            ->select('id','name');

        return datatables()->of($data)
            ->addIndexColumn()
            ->make(true);
    }
}

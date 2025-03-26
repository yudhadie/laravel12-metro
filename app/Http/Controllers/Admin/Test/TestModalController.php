<?php

namespace App\Http\Controllers\Admin\Test;

use App\Http\Controllers\Controller;
use App\Models\TestData;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Illuminate\Http\Request;

class TestModalController extends Controller
{
    public function index()
    {
        return view('admin.test.modal.index', [
            'title' => 'Test Data',
            'breadcrumbs' => Breadcrumbs::render('test'),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:test_data',
        ], [
            'name.required' => 'Nama wajib diisi!',
            'name.unique' => 'Nama sudah terdaftar, silakan gunakan nama lain!',
        ]);

        $data =  new TestData();
        $data->name = $request->name;
        $data->number = $request->number;
        $data->select = $request->select;
        $data->save();

        return redirect()->back()->with('success', 'Data berhasil diupdate');
    }

    public function show($id)
    {
        $data = TestData::findOrFail($id);

        return response()->json($data);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|unique:test_data,name,' . $id,
        ], [
            'name.required' => 'Nama wajib diisi!',
            'name.unique' => 'Nama sudah terdaftar, silakan gunakan nama lain!',
        ]);

        $data = TestData::FindOrFail($id);
        $data->update([
            'name' => $request->name,
            'number' => $request->number,
            'select' => $request->select,
        ]);

        return response()->json(['message' => 'Data berhasil diperbarui!']);
    }

    public function destroy(string $id)
    {
        $data = TestData::find($id);
        if ($data->name == 'admin') {
            return response()->json([
                'message' => 'Data admin tidak dapat dihapus.',
            ], 403);
        }
        $data->delete();
    }
}

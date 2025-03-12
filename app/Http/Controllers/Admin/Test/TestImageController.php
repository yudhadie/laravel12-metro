<?php

namespace App\Http\Controllers\Admin\Test;

use App\Http\Controllers\Controller;
use App\Models\TestData;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;

class TestImageController extends Controller
{
    public function index()
    {
        return view('admin.test.image.index',[
            'title' => 'Test Data',
            'breadcrumbs' => Breadcrumbs::render('test'),
        ]);
    }

    public function store(Request $request)
    {
        $img = null;
        $request->validate([
            'name' => 'required|unique:test_data',
            'cover' => 'required|file',
        ], [
            'name.required' => 'Nama wajib diisi!',
            'name.unique' => 'Nama sudah terdaftar, silakan gunakan nama lain!',
            'cover.required' => 'Image wajib upload!',
        ]);

        $data = new TestData();
        $data->name = $request->name;
        $data->save();

        if ($request->hasFile('cover')) {
            $img = $request->file('cover');
            $cover = 'uploads/test/'.time().'.'.$request->cover->extension();
            $image = ImageManager::imagick()->read(file_get_contents($img));
            $image->scale(height: 1000);
            $image->save($cover);

            $data->media()->create([
                'path' => $cover,
                'type' => 'cover',
            ]);
        }

        return response()->json(['message' => 'Data berhasil ditambah!']);
    }

    public function show($id)
    {
        $data = TestData::findOrFail($id);

        return response()->json([
            'id' => $data->id,
            'name' => $data->name,
            'img' => $data->img ? asset($data->img) : null,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|unique:test_data,name,'.$id,
        ], [
            'name.required' => 'Nama wajib diisi!',
            'name.unique' => 'Nama sudah terdaftar, silakan gunakan nama lain!',
        ]);

        $data = TestData::FindOrFail($id);
        $data->update([
            'name' => $request->name,
        ]);

        if ($request->hasFile('cover')) {

            if ($data->cover) {
                $data->cover->first()->delete();
            }

            $img = $request->file('cover');
            $cover = 'uploads/test/'.time().'.'.$request->cover->extension();
            $image = ImageManager::imagick()->read(file_get_contents($img));
            $image->scale(height: 1000);
            $image->save($cover);

            $data->media()->create([
                'path' => $cover,
                'type' => 'cover',
            ]);
        }

        return response()->json(['message' => 'Data berhasil diperbarui!']);
    }

    public function destroy(string $id)
    {
        $data = TestData::find($id);
        $data->delete();
    }
}

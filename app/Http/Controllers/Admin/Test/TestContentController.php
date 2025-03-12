<?php

namespace App\Http\Controllers\Admin\Test;

use App\Http\Controllers\Controller;
use App\Models\TestData;
use App\Models\TestTag;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;

class TestContentController extends Controller
{
    public function index()
    {
        return view('admin.test.content.index',[
            'title' => 'Test Data',
            'breadcrumbs' => Breadcrumbs::render('test'),
        ]);
    }

    public function create()
    {
        $tag = TestTag::all();

        return view('admin.test.content.create',[
            'title' => 'Add Test Data',
            'breadcrumbs' => Breadcrumbs::render('test'),
            'tags' => $tag,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:test_data|max:255',
        ]);

        $data = new TestData();
        $data->name = $request->name;
        $data->desc = $request->desc;
        $data->save();

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $gallerys) {
                $img = $gallerys;
                $gallery = 'uploads/test/'.Str::random(10).'.'.$img->extension();
                $image = ImageManager::imagick()->read(file_get_contents($img));
                $image->scale(height: 1000);
                $image->save($gallery);
                $data->media()->create([
                    'path' => $gallery,
                    'type' => 'gallery',
                ]);
            }
        }

        $data->tag()->sync($request->tag);

        return redirect()->route('test-content.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $data = TestData::FindOrFail($id);

        return view('admin.test.content.show',[
            'title' => 'Detail Test Data',
            'breadcrumbs' => Breadcrumbs::render('test'),
            'data' => $data,
        ]);
    }

    public function edit(string $id)
    {
        $data = TestData::FindOrFail($id);
        $tag = TestTag::all();
        $selectedTags = $data->tag->pluck('id')->toArray();

        return view('admin.test.content.edit',[
            'title' => 'Edit Test Data',
            'breadcrumbs' => Breadcrumbs::render('test'),
            'data' => $data,
            'tags' => $tag,
            'selectedTags' => $selectedTags,

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
            'desc' => $request->desc,
        ]);

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $gallerys) {
                $img = $gallerys;
                $gallery = 'uploads/test/'.Str::random(10).'.'.$img->extension();
                $image = ImageManager::imagick()->read(file_get_contents($img));
                $image->scale(height: 1000);
                $image->save($gallery);
                $data->media()->create([
                    'path' => $gallery,
                    'type' => 'gallery',
                ]);
            }
        }

        $data->tag()->sync($request->tag);

        return redirect()->back()->with('success', 'Data berhasil diupdate');
    }

    public function destroy(string $id)
    {
        $data = TestData::find($id);
        $data->delete();

        return redirect()->route('test-content.index')->with('error', 'Data berhasil dihapus');
    }
}

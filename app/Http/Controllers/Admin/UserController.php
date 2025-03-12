<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
// use Intervention\Image\Drivers\Imagick\Driver;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.setting.user.index',[
            'title' => 'Users',
            'breadcrumbs' => Breadcrumbs::render('user'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|max:255',
        ]);

        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;
        $data->password = bcrypt($request->password);
        $data->save();

        $data->syncRoles($request->role);

        return redirect()->route('user.index')->with('success', 'Data user berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = User::FindOrFail($id);

        return view('admin.setting.user.edit',[
            'title' => 'Edit Users',
            'breadcrumbs' => Breadcrumbs::render('user.edit',$data),
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'email' => 'required|unique:users,email,'.$id,
        ]);

        $data = User::find($id);

        if ($request->hasFile('photo')) {

            if ($data->photo) {
                $data->photo->first()->delete();
            }

            $img = $request->file('photo');
            $photo = 'uploads/user/'.time().'.'.$request->photo->extension();
            $image = ImageManager::imagick()->read(file_get_contents($img));
            $image->scale(height: 500);
            $image->save($photo);

            $data->media()->create([
                'path' => $photo,
                'type' => 'profile',
            ]);
        }

        $data->update([
            'name' => $request->name,
            'email' => $request->email,
            'active' => $request->active,
        ]);

        $data->syncRoles($request->role);

        if ($request->filled('password')) {
            $updateData['password'] = bcrypt($request->password);
            $data->update($updateData);
        }

        return redirect()->back()->with('success', 'Data user berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (in_array($id, ['1', '2'])) {
            return redirect()->route('user.index')->with('error', 'Data dengan ID ini tidak dapat dihapus.');
        }

        $data = User::find($id);

        if ($data->photo && Storage::exists($data->photo)) {
            Storage::delete($data->photo);
        }

        $data->delete();

        return redirect()->route('user.index')->with('error', 'Data User berhasil dihapus');
    }

    public function profile()
    {
        $id = Auth::user()->id;
        $data = User::FindOrFail($id);

        return view('admin.setting.user.profile',[
            'title' => 'Profile',
            'breadcrumbs' => Breadcrumbs::render('profile'),
            'data' => $data,
        ]);
    }

    public function data()
    {
        $data = User::query()
            ->select('id', 'name', 'email','active');

        return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('role', fn($x) => $x->role)
            ->make(true);
    }
}

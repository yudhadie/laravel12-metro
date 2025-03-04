<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function deleteuser(string $id)
    {
        $data = User::find($id);
        $photo = $data->photo;

        if ($photo != null) {
            Storage::delete($photo);
            $data->update([
                'photo' => null,
            ]);
        }

        return redirect()->back()->with('error','Photo Profile berhasil di hapus');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function destroy(string $id)
    {
        $media = Media::findOrFail($id);
        $media->delete();

        return redirect()->back()->with('error', 'Data berhasil dihapus');
    }
}

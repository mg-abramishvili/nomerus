<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use App\Models\TemporaryFile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        return Gallery::all();
    }

    public function store(Request $request) {
        $data = request()->all();

        $temp_file = TemporaryFile::where('folder', $data['image'])->first();
        
        rename(public_path() . '/temp_uploads/' . $temp_file->folder . '/' . $temp_file->filename, public_path() . '/uploads/' . now()->timestamp . '_' . $temp_file->filename);
        rmdir(public_path('temp_uploads/' . $temp_file->folder));
        $temp_file->delete();
        
        $galleryItem = new Gallery([
            'image' => '/uploads/' . now()->timestamp . '_' . $temp_file->filename
        ]);

        $galleryItem->save();
    }

    public function temp_gal_image_store(Request $request) {
        if($request->hasFile('image')) {
            
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $folder = uniqid() . '-' . now()->timestamp;
            $file->move(public_path() . '/temp_uploads/' . $folder, $filename);

            TemporaryFile::create([
                'folder' => $folder,
                'filename' => $filename
            ]);

            return $folder;
        }

        return '';
    }
}

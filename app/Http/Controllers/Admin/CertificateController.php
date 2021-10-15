<?php

namespace App\Http\Controllers\Admin;

use App\Models\Certificate;
use App\Models\TemporaryFile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index()
    {
        return Certificate::all();
    }

    public function cert_item($id, Request $request)
    {
        return Certificate::find($id);
    }

    public function store(Request $request) {
        $data = request()->all();

        $temp_file = TemporaryFile::where('folder', $data['image'])->first();
        
        rename(public_path() . '/temp_uploads/' . $temp_file->folder . '/' . $temp_file->filename, public_path() . '/uploads/' . now()->timestamp . '_' . $temp_file->filename);
        rmdir(public_path('temp_uploads/' . $temp_file->folder));
        $temp_file->delete();
        
        $certificate = new Certificate([
            'name' => $data['name'],
            'image' => '/uploads/' . now()->timestamp . '_' . $temp_file->filename
        ]);

        $certificate->save();
    }

    public function cert_update($id, Request $request) {
        $data = request()->all();
        $certificate = Certificate::find($id);

        if(TemporaryFile::where('folder', $data['image'])->first()) {
            $temp_file = TemporaryFile::where('folder', $data['image'])->first();
            rename(public_path() . '/temp_uploads/' . $temp_file->folder . '/' . $temp_file->filename, public_path() . '/uploads/' . now()->timestamp . '_' . $temp_file->filename);
            rmdir(public_path('temp_uploads/' . $temp_file->folder));
            $temp_file->delete();
            $certificate->name = $data['name'];
            $certificate->image = '/uploads/' . now()->timestamp . '_' . $temp_file->filename;
        } else {
            $certificate->name = $data['name'];
            $certificate->image = $data['image'];
        }

        $certificate->save();
    }

    public function add_image_store(Request $request) {
        if($request->hasFile('image')) {

            if($request->hasFile('image')) {
                $file = $request->file('image');
            }

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

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

    public function temp_cert_image_store(Request $request) {
        if($request->hasFile('cert_image')) {
            
            $file = $request->file('cert_image');
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

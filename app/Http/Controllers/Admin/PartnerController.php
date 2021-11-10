<?php

namespace App\Http\Controllers\Admin;

use App\Models\Partner;
use App\Models\TemporaryFile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;

class PartnerController extends Controller
{
    public function index()
    {
        return Partner::all();
    }

    public function partner_item($id, Request $request)
    {
        return Partner::find($id);
    }

    public function store(Request $request) {
        $data = request()->all();

        $temp_file = TemporaryFile::where('folder', $data['image'])->first();
        
        rename(public_path() . '/temp_uploads/' . $temp_file->folder . '/' . $temp_file->filename, public_path() . '/uploads/' . now()->timestamp . '_' . $temp_file->filename);
        rmdir(public_path('temp_uploads/' . $temp_file->folder));
        $temp_file->delete();
        
        $partner = new Partner([
            'name' => $data['name'],
            'image' => '/uploads/' . now()->timestamp . '_' . $temp_file->filename
        ]);

        $partner->save();
    }

    public function partner_update($id, Request $request) {
        $data = request()->all();
        $partner = Partner::find($id);

        if(TemporaryFile::where('folder', $data['image'])->first()) {
            $temp_file = TemporaryFile::where('folder', $data['image'])->first();
            rename(public_path() . '/temp_uploads/' . $temp_file->folder . '/' . $temp_file->filename, public_path() . '/uploads/' . now()->timestamp . '_' . $temp_file->filename);
            rmdir(public_path('temp_uploads/' . $temp_file->folder));
            $temp_file->delete();
            $partner->name = $data['name'];
            $partner->image = '/uploads/' . now()->timestamp . '_' . $temp_file->filename;
        } else {
            $partner->name = $data['name'];
            $partner->image = $data['image'];
        }

        $partner->save();
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

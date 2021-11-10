<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use App\Models\TemporaryFile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;

class ServiceController extends Controller
{
    public function index()
    {
        return Service::all();
    }

    public function service_item($id, Request $request)
    {
        return Service::find($id);
    }

    public function service_update($id, Request $request) {
        $data = request()->all();
        $service = Service::find($id);

        if(TemporaryFile::where('folder', $data['image'])->first()) {
            $temp_file = TemporaryFile::where('folder', $data['image'])->first();
            rename(public_path() . '/temp_uploads/' . $temp_file->folder . '/' . $temp_file->filename, public_path() . '/uploads/' . now()->timestamp . '_' . $temp_file->filename);
            rmdir(public_path('temp_uploads/' . $temp_file->folder));
            $temp_file->delete();
            $service->name = $data['name'];
            $service->text = $data['text'];
            $service->image = '/uploads/' . now()->timestamp . '_' . $temp_file->filename;
        } else {
            $service->name = $data['name'];
            $service->text = $data['text'];
            $service->image = $data['image'];
        }

        $service->save();
    }

    public function add_image_store(Request $request) {
        if($request->hasFile('image')) {

            if($request->hasFile('image')) {
                $file = $request->file('image');
            }

            $filename = time().'.'.$file->extension();
            $folder = uniqid() . '-' . now()->timestamp;
            $img = Image::make($file->path());
            $file->move(public_path() . '/temp_uploads/' . $folder, $filename);
            $img->resize(1000, 1000, function ($const) {
                $const->aspectRatio();
            })->save(public_path() . '/temp_uploads/' . $folder . '/' . $filename);

            //$file->move(public_path() . '/temp_uploads/' . $folder, $filename);

            TemporaryFile::create([
                'folder' => $folder,
                'filename' => $filename
            ]);

            return $folder;
        }

        return '';
    }
}

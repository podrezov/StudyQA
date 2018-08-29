<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadImage;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        return view('gallery.index', [
            'images' => Image::orderBy('id', 'desc')->paginate(12),
        ]);
    }

    public function upload(UploadImage $request)
    {
        $image = $request->file('img')->store(
            'images', 's3'
        );
        $path = Storage::disk('s3')->url($image);
        Image::create([
           'path' => $path
        ]);

        return redirect()->route('gallery')->with('status', 'Изображение успешно загружено!');
    }
}

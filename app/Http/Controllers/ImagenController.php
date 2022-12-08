<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    public function store(Request $request)
    {
       $imagen = $request->file('file');

       $nombreimagen = Str::uuid().".".$imagen->extension();

       $imagenservidor = Image::make($imagen);
        $imagenservidor->fit(1000,1000);

        $imagenpath= public_path('uploads').'/'.$nombreimagen;
        $imagenservidor->save($imagenpath);

       return response()->json(['imagen' => $nombreimagen ]);
    }
}

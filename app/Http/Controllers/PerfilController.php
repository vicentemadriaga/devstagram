<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('perfil.index');
    }

    public function store(Request $request,)
    {
        $request->request->add(['username' => Str::slug($request->username)]);
        $this->validate($request,[
            'username' =>  ['required' , 'unique:users,username,'.auth()->user()->id, 'max:20', 'min:5', 'not_in:editar-perfil' ],
        ]);
        if($request->imagen)
        {
            $imagen = $request->file('imagen');

            $nombreimagen = Str::uuid().".".$imagen->extension();
     
            $imagenservidor = Image::make($imagen);
            $imagenservidor->fit(1000,1000);
     
            $imagenpath= public_path('perfiles').'/'.$nombreimagen;
            $imagenservidor->save($imagenpath);
        }
        $usuario = User::find(auth()->user()->id);
        $usuario->username =  $request->username;
        $usuario->imagen = $nombreimagen ?? auth()->user()->imagen ?? '';
        $usuario->save();
        //redireccion
        return redirect()->route('post.index', $usuario->username);
    }
}

@extends('layouts.app')

@section('titulo')
Creando un post
@endsection

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')
<div class="md:flex md:items-center">
    <div class="md:w-1/2 px-10">
        <form action="{{ route('imagenes.store')}}" method="POST" enctype="multipart/form-data" 
        id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded 
        flex flex-col justify-center items-center">
        @csrf
        </form>
    </div>
    <div class="md:w-1/2 p-10  bg-white rounded-lg justify-center shadow-xl mt-10 md:mt-0">
        <form action="{{ route('post.store') }}" method="post" >
            @csrf
            <div class="mb-5">
                <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">
                    titulo
                </label> 
                <input 
                id="titulo"
                name="titulo"
                type="text"
                placeholder="ingrese un titulo"
                class="border p-3 w-full rounded-xl @error('name')
                    border-red-500
                @enderror "
                value="{{ old('titulo')}}"
                
                >
                @error('titulo')
                    <p class=" text-red-600 text-sm text-center">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">
                    descripcion
                </label> 
                <textarea 
                id="descripcion"
                name="descripcion"
                placeholder="ingrese una descripcion"
                class="border p-3 w-full rounded-xl @error('name')
                    border-red-500
                @enderror "
                >{{ old('descripcion')}}</textarea>
                @error('descripcion')
                    <p class=" text-red-600 text-sm text-center">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <input type="hidden" name="imagen" value="{{ old('imagen') }}">
                @error('imagen')
                <p class=" text-red-600 text-sm text-center">{{ $message }}</p>
                @enderror
            </div>

            <input 
            type="submit"
            value="Crear publicacion"
            class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-xl"
            >
        </form>
    </div>
</div>

@endsection
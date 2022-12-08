@extends('layouts.app')
@section('titulo')
Editar perfil: {{ auth()->user()->username}}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="wmd:w-1/2 bg-white shadow p-6">
            <form method="POST" action="{{ route('perfil.store') }}" enctype="multipart/form-data" class="mt-10 md:mt-0">
                @csrf
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                        username
                    </label> 
                    <input 
                    id="username"
                    name="username"
                    type="text"
                    placeholder="ingrese su nuevo nombre de usuario"
                    class="border p-3 w-full rounded-xl @error('username')
                        border-red-500
                    @enderror "
                    value="{{ auth()->user()->username }}"
                    
                    >
                    @error('username')
                        <p class=" text-red-600 text-sm text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">
                        imagen del perfil
                    </label> 
                    <input 
                    id="imagen"
                    name="imagen"
                    type="file"
                    accept=".jpg,.png,.jpeg"
                    class="border p-3 w-full rounded-xl"
                    value=""
                    >
                </div>
                <input 
                type="submit"
                value="Guardar cambios"
                class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-xl"
                >
            </form>
        </div>
    </div>
@endsection